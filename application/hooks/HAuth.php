<?php

class HAuth
{
    private $CI;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    public function auth(){
        $this->CI->load->helper('url');
        if(!preg_match('/login.*/i',uri_string())){
            if(!isset($_SESSION['username'])){
                redirect('login');
            }
        }else{
            if(isset($_SESSION['username'])){
                redirect('sport');
            }
        }
    }
}