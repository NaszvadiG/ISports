<?php
class MLogin extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function verify($username,$password){
        $sql = "select * from user where username = ? and password = ?";
        $rs = $this->db->query($sql,array($username,$password))->result();
        return sizeof($rs)!=0;
    }

    public function exist_user($username){
        $sql = "select * from user where username = ?";
        $rs = $this->db->query($sql,array($username))->result();
        return sizeof($rs)!=0;
    }

    public function insert_user($username,$password,$nickname,$email){
        $sql = "insert into user(username,password,nickname,email) values(?,?,?,?)";
        return $this->db->query($sql,array($username,$password,$nickname,$email));
    }

    public function userinfo($username){
        $sql = "select * from user where username = ?";
        $rs = $this->db->query($sql,array($username))->row();
        return $rs;
    }

    public function login($id,$logintime,$triggertime){
        $sql = "select * from user where id = ?";
        $r = $this->db->query($sql,array($id))->row();
        if($r->lastlogintime<$triggertime){
            $sql2 = "update user set useday = useday+1,lastlogintime = ? where id = ?";
            $this->db->query($sql2,array($logintime,$id));
        }
    }
}