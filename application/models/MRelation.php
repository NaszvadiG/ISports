<?php
class MRelation extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function search($keyword){
        $sql = "select * from user where id like ? or nickname like ?";
        $rs = $this->db->query($sql,array('%'.$keyword.'%','%'.$keyword.'%'))->result();
        return $rs;
    }

    public function add($userid,$friendid){
        $sql = "insert into friendapplycation(userid,friendid) values(?,?)";
        return $this->db->query($sql,array($userid,$friendid));
    }

    public function delete($userid,$friendid){
        $sql = "delete from friend where userid = ? and friendid = ?";
        $this->db->trans_start();
        $this->db->query($sql,array($userid,$friendid));
        $this->db->query($sql,array($friendid,$userid));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function confirm_list($userid){
        $sql = "select t.userid as id, u.nickname, u.email "
            ."from friendapplycation t,user u "
            ."where t.userid = u.id and t.friendid = ?";

        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public function confirm($userid,$friendid,$type){
        $sql1 = "delete from friendapplycation where userid = ? and friendid = ?";
        $sql2 = "insert into friend(userid,friendid) values(?,?)";

        $this->db->trans_start();
        $this->db->query($sql1,array($friendid,$userid));
        if($type == "accept"){
            $this->db->query($sql2,array($userid,$friendid));
            $this->db->query($sql2,array($friendid,$userid));
        }
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function send_list($userid){
        $sql = "select t.friendid as id, u.nickname, u.email "
            ."from friend t,user u "
            ."where t.userid = ? and t.friendid = u.id";

        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public function send($userid,$friendid,$time,$content){
        $sql = "insert into friendmessage(userid,friendid,time,content) values(?,?,?,?)";
        return $this->db->query($sql,array($userid,$friendid,$time,$content));
    }


    public function message($userid,$friendid,$time){
        $sql = "select * "
            ."from (select * from friendmessage where userid = ? and friendid = ? and time > ? "
            ."union select * from friendmessage where userid = ? and friendid = ? and time > ?) "
            ."order by time asc";
        $rs = $this->db->query($sql,array($userid,$friendid,$time,$friendid,$userid,$time))->result();
        return $rs;
    }
}