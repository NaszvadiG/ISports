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
            <li class="active">个人资料</li>
        </ol>
        <!-- page contents-->
        <div id="page-content" class="page-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default info-panel">

                        <div class="panel-heading">
                            我的资料卡
                        </div>
                        <div class="panel-body">
                            <form id="form-info-modify" class="form-horizontal" role="form">
                                <div id="form-group-username" class="form-group">
                                    <label for="input-info-username" class="col-md-2 control-label">用户名</label>
                                    <div class="col-md-10">
                                        <span class="info"><?php echo $user->username?></span>
                                    </div>
                                </div>
                                <div id="form-group-nickname" class="form-group">
                                    <label for="input-info-nickname" class="col-md-2 control-label">昵称</label>
                                    <div class="col-md-10">
                                        <input type="text" id="input-info-nickname" class="form-control" name="nickname" value="<?php echo $user->nickname?>">
                                    </div>
                                </div>
                                <div id="form-group-email" class="form-group">
                                    <label for="input-info-email" class="col-md-2 control-label">邮箱</label>
                                    <div class="col-md-10">
                                        <input type="text" id="input-info-email" class="form-control" name="email" value="<?php echo $user->email?>">
                                    </div>
                                </div>
                                <div id="form-group-password" class="form-group">
                                    <label for="input-info-password" class="col-md-2 control-label">密码</label>
                                    <div class="col-md-10">
                                        <input type="password" id="input-info-password" class="form-control" name="password" value="<?php echo $user->password?>">
                                    </div>
                                </div>
                                <div id="form-group-password2" class="form-group">
                                    <label for="input-info-password2" class="col-md-2 control-label">确认密码</label>
                                    <div class="col-md-10">
                                        <input type="password" id="input-info-password2" class="form-control" name="password2" value="<?php echo $user->password?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-10 col-md-offset-2">
                                        <button type="button" class="btn btn-success col-md-12" onclick="infoModify()">提交修改信息</button>
                                    </div>
                                </div>
                            </form>
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
<script src="/js/info.js"></script>
</body>
</html>