<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MActivity','model');
    }

	public function index()
	{
        $userid = $_SESSION['id'];
        $all = $this->model->all_activity($userid);
        $data['all'] = $all;
        $mine = $this->model->mine_activity($userid);
        $data['mine'] = $mine;
		$this->load->view('activity',$data);
	}


	public function create(){
        $userid = $_SESSION['id'];
        $name = $_POST['name'];
        $spot = $_POST['spot'];
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $content = $_POST['content'];

        $out = "false";

        if($_SESSION['useday']<2){
            $this->output->set_output("您没有权限创建活动，权限进度(".$_SESSION['useday']." / 2)");
            return;
        }
        if($this->model->create($userid,$name,$spot,$starttime,$endtime,$content)){
            $out = "true";
        }

        $this->output->set_output($out);
    }

    public function join(){
        $userid = $_SESSION['id'];
        $activityid = $_POST['activityid'];

        $out = "false";
        if($this->model->join($userid,$activityid)){
            $out = "true";
        }

        $this->output->set_output($out);
    }
}
