<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/icon.ico">

    <title>爱运动管理平台</title>

    <link href="/css/plugin/bootstrap.min.css" rel="stylesheet">
    <link href="/css/plugin/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="/css/theme-default.css" rel="stylesheet">
</head>
<body>

<!--contents-->
<div id="container" class="container-fluid">
    <?php require 'common/left-sidebar.php' ?>

    <!-- right side content-->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php require 'common/top-sidebar.php' ?>
        <!-- lead line buttons-->
        <ol class="breadcrumb">
            <li><a href="#">主页</a></li>
            <li class="active">运动博客</li>
        </ol>
        <!-- page contents-->
        <div id="page-content" class="page-content">
            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body blog-basic padding-0">
                        <div class="box">
                            <span class="number"><?php echo $basic->cares;?></span>
                            <span class="description">关注</span>
                        </div>
                        <div class="box">
                            <span class="number"><?php echo $basic->fans;?></span>
                            <span class="description">粉丝</span>
                        </div>
                        <div class="box">
                            <span class="number"><?php echo $basic->messages;?></span>
                            <span class="description">动态</span>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body list-group blog-setting-list padding-0">
                        <?php if(!$follow){?>
                            <a class="list-group-item" onclick="blogFollow(<?php echo $followid;?>)">
                                <span class="glyphicon glyphicon-heart"></span>关注
                            </a>
                        <?php }else{?>
                            <a class="list-group-item" onclick="blogUnfollow(<?php echo $followid;?>)">
                                <span class="glyphicon glyphicon-heart"></span>取消关注
                            </a>
                        <?php }?>
                    </div>
                </div>
            </div>
            <div class="col-md-9">

                <?php foreach ($messages as $message){?>
                    <div class="row">
                        <div class="blog-content">
                            <div class="blog-panel">
                                <div class="blog-heading">
                                    <img class="master-image" src="/img/cat.jpg">
                                    <a class="name"><?php echo $message->nickname;?></a>
                                    <a class="time"><?php echo $message->time;?></a>
                                </div>
                                <div class="blog-body">
                                    <p class="context">
                                        <?php echo $message->content;?>
                                    </p>
                                </div>
                                <div class="blog-footer">
                                    <?php foreach ($message->comments as $comment){?>
                                        <div class="comment">
                                            <img class="commenter-image" src="/img/cat.jpg">
                                            <div class="comment-context">
                                                <a class="name"><?php echo $comment->nickname;?></a>
                                                <a class="time"><?php echo $comment->time;?></a>
                                                <span class="context">
                                                    <?php echo $comment->content;?>
                                                </span>
                                            </div>
                                        </div>
                                    <?php }?>
                                    <div class="control">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="发送消息...">
                                            <div class="input-group-btn">
                                                <button class="btn btn-default button-blog-comment" value="<?php echo $message->id;?>">发表</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }?>

            </div>
        </div>
    </div>

</div>

<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/plugin/echarts.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/blog.js"></script>
</body>
</html>