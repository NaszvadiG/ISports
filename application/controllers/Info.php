<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Info extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MInfo','model');
    }

    public function index(){
        $userid = $_SESSION['id'];
        $user = $this->model->user($userid);
        $data['user'] = $user;
        $this->load->view('info',$data);
    }

    public function modify(){
        $userid = $_SESSION['id'];
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $out = "false";
        if($this->model->modify($userid,$nickname,$email,$password)){
            $_SESSION['nickname'] = $nickname;
            $out = "true";
        }

        $this->output->set_output($out);
    }
}
