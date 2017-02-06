<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('MLogin','model');
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function verify(){
	    $username = $_POST['username'];
        $password = $_POST['password'];
        $this->load->helper('url');
        if(empty($username)||empty($password)){
            redirect('login');
        }
	    if($this->model->verify($username,$password)){
	        $_SESSION['username'] = $username;
            $rs = $this->model->userinfo($username);
            $_SESSION['nickname'] = $rs->nickname;
            $_SESSION['id'] = $rs->id;
            $_SESSION['useday'] = $rs->useday;
            $_SESSION['image'] = $rs->image;
            $logintime = date("Y-m-d H:i:s");
            $triggertime = date_format(date_sub(date_create(),date_interval_create_from_date_string("1 days")),"Y-m-d H:i:s");
            $this->model->login($rs->id,$logintime,$triggertime);
            redirect('sport');
        }else{
            redirect('login');
        }
    }

    public function signup(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $this->load->helper('url');
        if(empty($username)||empty($password)){
            redirect('login');
        }
        if($this->model->exist_user($username)){
            redirect('login');
        }else{
            if($this->model->insert_user($username,$password,$nickname,$email)){
                $_SESSION['username'] = $username;
                $_SESSION['nickname'] = $nickname;
                $rs = $this->model->userinfo($username);
                $_SESSION['id'] = $rs->id;
                $_SESSION['useday'] = $rs->useday;
                $_SESSION['image'] = 1;
                redirect('home');
            }else{
                $_COOKIE['username_on_use'] = true;
                redirect('login');
            }
        }
    }

    public function exist_user(){
        $username = $_POST['username'];
        $out = "false";
        if($this->model->exist_user($username)){
            $out = "true";
        }
        $this->output->set_output($out);
    }
}
