<?php
class MSport extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function data($userid){
        $sql = "select * from sport where userid = ? order by date asc";
        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public  function insert($userid,$distance,$speed,$time,$date){
        $sql = "insert into sport(userid,distance,speed,time,date) values (?,?,?,?,?)";
        return $this->db->query($sql,array($userid,$distance,$speed,$time,$date));
    }

    public function get($userid,$date=null){
        if($date==null){
            $sql = "select * from sport where userid = ? order by date asc";
            $rs = $this->db->query($sql,array($userid))->result();
            return $rs;
        }else{
            $sql = "select * from sport where userid = ? and date = ?";
            $rs = $this->db->query($sql,array($userid,$date))->result();
            return $rs;
        }
    }

    public function init(){

        $sql = "select id from user ";
        $rs = $this->db->query($sql)->result();

        $this->db->trans_start();

        $sql2 = "delete from sport";
        $this->db->query($sql2);

        foreach ($rs as $r){
            $id = $r->id;
            for($i=1;$i<100;$i++){
                $date = date_format(date_sub(date_create(),date_interval_create_from_date_string("".$i." days")),"Y-m-d");
                $distance = rand(2,20);
                $time = rand(1,10);
                $speed = round($distance/$time,2);
                $sql3 = "insert into sport(userid,distance,speed,time,date) values (?,?,?,?,?)";
                $this->db->query($sql3,array($id,$distance,$speed,$time,$date));
            }
        }

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

}