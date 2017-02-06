<!-- put in message-box -->
<?php foreach ($rs as $r){?>
    <?php $isuser = ($userid == $r->userid); ?>
    <div class="message <?php if(!$isuser){echo "message-other";}?>">
        <div class="message-image">
            <img src="/img/cat.jpg">
        </div>
        <div class="message-text">
            <div class="message-heading">
                <a class="name"><?php if($isuser){echo $usernickname;}else{echo $friendnickname;}?></a>
                <span class="time"><?php echo $r->time?></span>
            </div>
            <div class="message-body">
                <?php echo $r->content?>
            </div>
        </div>
    </div>
<?php }?>
