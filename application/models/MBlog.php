<?php
class MBlog extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function basic($userid){
        $sql = "select t2.cares,t1.fans,t3.messages "
            ."from (select count(*) as fans from follower where userid = ?) t1, "
            ."(select count(*) as cares from follower where followerid = ?) t2, "
            ."(select count(*) as messages from blogmessage where userid = ?) t3 ";
        $r = $this->db->query($sql,array($userid,$userid,$userid))->row();
        return $r;
    }

    public function message($userid,$include_cares=false){
        if($include_cares){
            $sql = "select blogmessage.*,user.nickname "
                ."from blogmessage,user where user.id = blogmessage.userid and ".
                "(userid = ? or userid in (select userid from follower where followerid = ?)) "
                ."order by time desc";
            $rs = $this->db->query($sql,array($userid,$userid))->result();

            foreach ($rs as $r){
                $sql2 = "select blogcomment.*,user.nickname from blogcomment,user "
                    ."where user.id=blogcomment.userid and messageid = ?";
                $r->comments = $this->db->query($sql2,array($r->id))->result();
            }
            return $rs;
        }else{
            $sql = "select blogmessage.*,user.nickname "
                ."from blogmessage,user where user.id = blogmessage.userid and userid = ? order by time desc";
            $rs = $this->db->query($sql,array($userid))->result();

            foreach ($rs as $r){
                $sql2 = "select blogcomment.*,user.nickname from blogcomment,user "
                    ."where user.id=blogcomment.userid and messageid = ?";
                $r->comments = $this->db->query($sql2,array($r->id))->result();
            }
            return $rs;
        }
    }


    public function publish($userid,$time,$content){
        $sql = "insert into blogmessage(userid,time,content) values(?,?,?)";
        return $this->db->query($sql,array($userid,$time,$content));
    }


    public function comment($userid,$messageid,$time,$content){
        $sql = "insert into blogcomment(userid,messageid,time,content) values(?,?,?,?)";
        return $this->db->query($sql,array($userid,$messageid,$time,$content));
    }

    public function follow($userid,$followerid){
        $sql = "insert into follower(userid,followerid) values(?,?)";
        return $this->db->query($sql,array($userid,$followerid));
    }

    public function unfollow($userid,$followerid){
        $sql = "delete from follower where userid = ? and followerid = ?";
        return $this->db->query($sql,array($userid,$followerid));
    }

    public function care($userid){
        $sql = "select u.* from user u,follower f "
            ."where u.id = f.userid and f.followerid = ?";
        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public function fan($userid){
        $sql = "select user.* from user u,follower f "
            ."where u.id = f.followerid and f.userid = ?";
        $rs = $this->db->query($sql,array($userid))->result();
        return $rs;
    }

    public function exist_user($userid){
        $sql = "select * from user where id = ?";
        $rs = $this->db->query($sql,array($userid))->result();
        return sizeof($rs)!=0;
    }

    public function exist_follower($userid,$followerid){
        $sql = "select * from follower where userid = ? and followerid = ?";
        $rs = $this->db->query($sql,array($userid,$followerid))->result();
        return sizeof($rs)!=0;
    }
}