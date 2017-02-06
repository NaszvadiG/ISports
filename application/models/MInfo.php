<?php
class MInfo extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function user($userid){
        $sql = "select * from user where id = ?";
        $r = $this->db->query($sql,array($userid))->row();
        return $r;
    }

    public  function modify($userid,$nickname,$email,$password){
        $sql = "update user set nickname = ?,email = ?,password = ? where id = ?";
        return $this->db->query($sql,array($nickname,$email,$password,$userid));
    }

}