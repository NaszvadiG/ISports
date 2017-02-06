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
<div id="modal-create-activity" class="modal fade container-fluid"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">发起活动</h4>
            </div>
            <form id="form-create-activity" action="/activity/create" class="form-horizontal" role="form">
                <div class="modal-body">
                    <div class="form-group" id="form-group-name">
                        <label for="input-activity-name" class="col-md-2 control-label">活动主题</label>
                        <div class="col-md-10">
                            <input type="text" id="input-activity-name" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group" id="form-group-spot">
                        <label for="input-activity-spot" class="col-md-2 control-label">活动地点</label>
                        <div class="col-md-10">
                            <input type="text" id="input-activity-spot" class="form-control" name="spot">
                        </div>
                    </div>
                    <div class="form-group" id="form-group-time">
                        <label class="col-md-2 control-label">活动时间</label>
                        <div class="col-md-5">
                            <input id="input-activity-starttime" class="datetime-picker form-control"
                                   style="margin-right: 0" placeholder="开始时间" name="starttime">
                        </div>

                        <div class="col-md-5">
                            <input id="input-activity-endtime" class="datetime-picker form-control"
                                   placeholder="结束时间" name="endtime">
                        </div>
                    </div>
                    <div class="form-group" id="form-group-content">
                        <label for="input-activity-content" class="col-md-2 control-label">活动简介</label>
                        <div class="col-md-10">
                            <textarea id="input-activity-content" class="form-control" name="content" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="createActivity()">发布</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div id="modal-show-activity" class="modal fade container-fluid"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">活动详情</h4>
            </div>
            <form id="form-show-activity" class="form-horizontal" role="form">
                <div class="modal-body">
                    <div class="form-group" id="form-group-name">
                        <label for="show-activity-name" class="col-md-2 control-label">活动主题</label>
                        <div class="col-md-10">
                            <input type="text" id="show-activity-name" class="form-control" readonly name="name">
                        </div>
                    </div>
                    <div class="form-group" id="form-group-spot">
                        <label for="show-activity-spot" class="col-md-2 control-label">活动地点</label>
                        <div class="col-md-10">
                            <input type="text" id="show-activity-spot" class="form-control" readonly name="spot">
                        </div>
                    </div>
                    <div class="form-group" id="form-group-time">
                        <label class="col-md-2 control-label">活动时间</label>
                        <div class="col-md-5">
                            <input id="show-activity-starttime" class="form-control"
                                   style="margin-right: 0" placeholder="开始时间" readonly name="starttime">
                        </div>

                        <div class="col-md-5">
                            <input id="show-activity-endtime" class="form-control"
                                   placeholder="结束时间" readonly name="endtime">
                        </div>
                    </div>
                    <div class="form-group" id="form-group-content">
                        <label for="show-activity-content" class="col-md-2 control-label">活动简介</label>
                        <div class="col-md-10">
                            <textarea id="show-activity-content" class="form-control" readonly name="content" rows="3"></textarea>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
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
                <li class="active">活动管理</li>
            </ol>
            <!-- page contents-->
            <div id="page-content" class="page-content">
                <div class="row">
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active" id="button-activity-all"><a href="#">所有活动</a></li>
                        <li role="presentation" id="button-activity-mine"><a href="#">我的活动</a></li>
                    </ul>
                </div>
                <div id="activity-content">

                </div>
            </div>
        </div>

</div>

<div id="activity-all" class="hide activity-all">
    <?php foreach ($all as $ra){?>
        <div class="col-md-6 padding-lr-5">
            <div class="panel panel-default activity-panel">
                <div class="panel-heading">
                    <span><?php echo $ra->name?></span>
                </div>
                <div class="panel-body">
                    <p><?php echo $ra->content?></p>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-success pull-right
                            button-join-activity" onclick="joinActivity(this)" value="<?php echo $ra->id?>">我要参与</button>
                            <button type="button" class="btn btn-primary pull-right button-show-activity" onclick="showActivity(this)"
                                    data-toggle="modal" data-target="#modal-show-activity"
                                    name="<?php echo $ra->name?>"
                                    spot="<?php echo $ra->spot?>"
                                    starttime="<?php echo $ra->starttime?>"
                                    endtime="<?php echo $ra->endtime?>"
                                    content="<?php echo $ra->content?>">查看详情</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>

<div id="activity-mine" class="hide activity-mine">
    <?php foreach ($mine as $rm){?>
        <div class="col-md-6 padding-lr-5">
            <div class="panel panel-default activity-panel">
                <div class="panel-heading">
                    <span><?php echo $rm->name?></span>
                </div>
                <div class="panel-body">
                    <p><?php echo $rm->content?></p>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-primary pull-right button-show-activity" onclick="showActivity(this)"
                                     data-toggle="modal" data-target="#modal-show-activity"
                                    name="<?php echo $rm->name?>"
                                    spot="<?php echo $rm->spot?>"
                                    starttime="<?php echo $rm->starttime?>"
                                    endtime="<?php echo $rm->endtime?>"
                                    content="<?php echo $rm->content?>">查看详情</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>

    <div class="col-md-12">
        <button id="button-create-activity" class="btn btn-success col-md-12" data-toggle="modal"
        data-target="#modal-create-activity">发起新的活动</button>
    </div>

</div>

<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/plugin/bootstrap-datetimepicker.min.js"></script>
<script src="/js/plugin/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/common.js"></script>
<script src="/js/activity.js"></script>
</body>
</html>