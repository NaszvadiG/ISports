<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MSport','model');
    }

	public function index()
	{
        $userid = $_SESSION['id'];

        $all = $this->model->data($userid);
        $data['all'] = $all;

		$this->load->view('sport',$data);
	}

	public function data(){
        if(isset($_POST['userid'])){
            $out = $this->model->insert($_POST['userid'],$_POST['distance'],$_POST['speed'],$_POST['time'],$_POST['date']);
        }else{
            $rs = null;
            if(isset($_GET['date'])){
                $rs = $this->model->get($_GET['userid'],$_GET['date']);
            }else{
                $rs = $this->model->get($_GET['userid']);
            }
            $out = json_encode($rs);
        }
        $this->output->set_output($out);
    }

    public function init(){
        $out = "error.";

        if($this->model->init()){
            $out = "success.";
        }
        $this->output->set_output($out);
    }

    public function test(){
        $this->load->view('test');
    }
}
