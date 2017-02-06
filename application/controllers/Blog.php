<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MBlog','model');
    }

	public function index($id=null)
	{
        $userid = $_SESSION['id'];
        if($_SESSION['useday']<3){
            $data['info'] = "您没有权限进入博客，权限进度(".$_SESSION['useday']." / 3)";
            $this->load->view('forbid',$data);
            return;
        }
	    if($id != null && $id != $userid){
            if($this->model->exist_user($id)){
                $basic = $this->model->basic($id);
                $data['followid'] = $id;
                $data['basic'] = $basic;
                $data['follow'] = $this->model->exist_follower($id,$userid);
                $messages = $this->model->message($id);
                $data['messages'] = $messages;
                $this->load->view('blog-other',$data);
                return;
            }
        }

        $basic = $this->model->basic($userid);
        $data['basic'] = $basic;
        $messages = $this->model->message($userid,true);
        $data['messages'] = $messages;
		$this->load->view('blog',$data);
	}

	public function publish(){

        $userid = $_SESSION['id'];
        $time = date("Y-m-d H:i:s");
        $content = $_POST['content'];

        $out = "false";
        if($this->model->publish($userid,$time,$content)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function comment(){
        $userid = $_SESSION['id'];
        $messageid = $_POST['messageid'];
        $time = date("Y-m-d H:i:s");
        $content = $_POST['content'];

        $out = "false";
        if($this->model->comment($userid,$messageid,$time,$content)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function follow(){
        $userid = $_SESSION['id'];
        $followid = $_POST['followid'];

        $out = "false";
        if($this->model->follow($followid,$userid)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function unfollow(){
        $userid = $_SESSION['id'];
        $followid = $_POST['followid'];

        $out = "false";
        if($this->model->unfollow($followid,$userid)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function care(){
        $userid = $_SESSION['id'];

        $basic = $this->model->basic($userid);
        $data['basic'] = $basic;
        $rs = $this->model->care($userid);
        $data['rs'] = $rs;
        $this->load->view('blog-follow',$data);
    }


}