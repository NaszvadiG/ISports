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
                        <a class="list-group-item" href="/blog">
                            <span class="glyphicon glyphicon-cloud"></span>动态首页
                        </a>
                        <a class="list-group-item" href="/blog/care">
                            <span class="glyphicon glyphicon-heart"></span>我的关注
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="list-group">
                    <?php foreach ($rs as $r){?>
                        <a href="<?php echo "/blog/".$r->id;?>" class="list-group-item friend-info" value="<?php echo $r->id?>">
                            <img src="/img/cat.jpg" class="pull-left friend-image" alt="Dmitry Ivaniuk">
                            <span class="name"><?php echo $r->nickname?></span>
                            <p class="message"><?php echo $r->email?></p>
                        </a>
                    <?php }?>
                </div>
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