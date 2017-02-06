<?php
class MActivity extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function all_activity($userid){
        $sql = "select * from activity where id not in "
            ."(select a.id from activity a, participant p where a.id=p.activityid and p.userid = ?)";
        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public function mine_activity($userid){
        $sql = "select * from activity where id in "
            ."(select a.id from activity a, participant p where a.id=p.activityid and p.userid = ?)";
        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public function create($userid,$name,$spot,$starttime,$endtime,$content){

        $sql1 = "insert into activity(name,spot,starttime,endtime,content,sponsorid) values(?,?,?,?,?,?)";
        $sql2 = "insert into participant(activityid,userid) values(?,?)";

        $this->db->trans_start();
        $this->db->query($sql1,array($name,$spot,$starttime,$endtime,$content,$userid));
        $activityid = $this->db->insert_id();
        $this->db->query($sql2,array($activityid,$userid));
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function join($userid,$activityid){
        $sql = "insert into participant(activityid,userid) values(?,?)";
        return $this->db->query($sql,array($activityid,$userid));
    }
}