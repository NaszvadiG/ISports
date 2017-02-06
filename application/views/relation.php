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
<!-- modal window -->
<div id="modal-search" class="modal fade container-fluid"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">查找用户</h4>
            </div>
            <form id="form-modal" action="/relation/search" class="form-horizontal" role="form" method="post">
                <div class="modal-body">
                    <div id="form-group-keyword" class="form-group">
                        <label for="input-search-keyword" class="hidden control-label"></label>
                        <div class="col-md-12">
                            <input type="text" id="input-search-keyword" class="form-control" name="keyword" placeholder="请输入用户标识符或昵称">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="search()">查找</button>
                </div>
            </form>

        </div>
    </div>
</div>
<div id="modal-confirm" class="modal fade container-fluid"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">申请列表</h4>
            </div>
            <form id="form-modal" class="form-horizontal" role="form" method="post" onsubmit="return false;">
                <div class="modal-body">
                    <div class="row">
                        <div class="list-group relation-confirm-list">
                            <?php foreach ($cl as $rcl){?>
                                <a href="#" class="list-group-item friend-info" value="<?php echo $rcl->id?>">
                                    <img src="/img/cat.jpg" class="pull-left friend-image" alt="Dmitry Ivaniuk">
                                    <span class="name"><?php echo $rcl->nickname?></span>
                                    <p class="message"><?php echo $rcl->email?></p>
                                </a>
                            <?php }?>
                        </div>
                    </div>
                    <div class="row">
                        <div id="button-confirm-refuse" class="btn-group col-md-12 padding-0" value="-1">
                            <button class="btn btn-danger col-md-6">
                                <span class="glyphicon glyphicon-remove"></span>
                                拒绝
                            </button>
                            <button id="button-confirm-accept" class="btn btn-success col-md-6" value="-1">
                                <span class="glyphicon glyphicon-check"></span>
                                同意
                            </button>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!--contents-->
<div id="container" class="container-fluid">
    <?php require 'common/left-sidebar.php' ?>

    <!-- right side content-->
    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
        <?php require 'common/top-sidebar.php' ?>
        <!-- lead line buttons-->
        <ol class="breadcrumb">
            <li><a href="#">主页</a></li>
            <li class="active">社交关系</li>
        </ol>
        <!-- page contents-->
        <div id="page-content" class="page-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="list-group relation-friend-list">
                        <?php foreach ($sl as $rsl){?>
                            <a href="#" class="list-group-item friend-info" value="<?php echo $rsl->id?>">
                                <img src="/img/cat.jpg" class="pull-left friend-image" alt="Dmitry Ivaniuk">
                                <span class="name"><?php echo $rsl->nickname?></span>
                                <p class="message"><?php echo $rsl->email?></p>
                            </a>
                        <?php }?>
                    </div>

                    <div class="row">
                        <div class="btn-group col-md-12 padding-0">
                            <button id="button-relation-delete" class="btn btn-danger col-md-6">
                                <span class="glyphicon glyphicon-remove"></span>
                                删除好友
                            </button>
                            <button class="btn btn-primary col-md-6" data-toggle="modal"
                                    data-target="#modal-search">
                                <span class="glyphicon glyphicon-search"></span>
                                查找用户
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 " style="padding-left: 0;padding-right: 0;">
                            <button class="btn btn-success col-md-12" data-toggle="modal"
                                    data-target="#modal-confirm">
                                <span class="glyphicon glyphicon-align-justify"></span>
                                我的申请
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row padding-0">
                        <div id="message-box" class="message-box">



                        </div>
                    </div>
                    <div class="row">
                        <div class="message-controller">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div class="input-group">
                                        <input id="input-send-content" type="text" class="form-control" placeholder="请输入发送消息...">
                                        <div class="input-group-btn">
                                            <button id="button-relation-send" class="btn btn-success" value="-1">发送</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/plugin/echarts.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/relation.js"></script>
</body>
</html>