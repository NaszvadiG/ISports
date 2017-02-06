<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Relation extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MRelation','model');
    }

	public function index()
	{
        $userid = $_SESSION['id'];
        $cl = $this->model->confirm_list($userid);
        $data['cl'] = $cl;
        $sl = $this->model->send_list($userid);
        $data['sl'] = $sl;
		$this->load->view('relation',$data);
	}

	public function search(){
	    $keyword = $_POST['keyword'];
        $rs = $this->model->search($keyword);
        $data['rs'] = $rs;
        $this->load->view('relation-search',$data);
    }

    public function add(){
        $userid = $_SESSION['id'];
        $friendid = $_POST['friendid'];

        $out = "false";
        if($this->model->add($userid,$friendid)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function delete(){
        $userid = $_SESSION['id'];
        $friendid = $_POST['friendid'];

        $out = "false";
        if($this->model->delete($userid,$friendid)){
            $out = "true";
        }

        $this->output->set_output($out);
    }


    public function confirm(){
        $userid = $_SESSION['id'];
        $friendid = $_POST['friendid'];
        $type = $_POST['type'];

        $out = "false";
        if($this->model->confirm($userid,$friendid,$type)){
            $out = "true";
        }

        $this->output->set_output($out);
    }


    public function send(){
        $userid = $_SESSION['id'];
        $friendid = $_POST['friendid'];
        $time = date("Y-m-d H:i:s");
        $content = $_POST['content'];

        $out = "false";
        if($this->model->send($userid,$friendid,$time,$content)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function message(){
        $userid = $_SESSION['id'];
        $friendid = $_POST['friendid'];
        $friendnickname = $_POST['friendnickname'];
        $time = date_format(date_sub(date_create(),date_interval_create_from_date_string("2 days")),"Y-m-d H:i:s");

        $rs = $this->model->message($userid,$friendid,$time);
        $data['rs'] = $rs;
        $data['friendnickname'] = $friendnickname;
        $data['userid'] = $userid;
        $data['usernickname'] = "我";
        $this->load->view('relation-message',$data);
    }
}
