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
                <li class="active">权限</li>
            </ol>
            <!-- page contents-->
            <div id="page-content" class="page-content">
                <div class="row">
                    <h5><?php echo $info;?></h5>
                </div>

            </div>
        </div>

</div>


<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/plugin/bootstrap-datetimepicker.min.js"></script>
<script src="/js/plugin/bootstrap-datetimepicker.zh-CN.js"></script>
<script src="/js/common.js"></script>
</body>
</html>