
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/img/icon.ico">

    <title>爱运动管理平台</title>

    <link href="/css/plugin/bootstrap.min.css" rel="stylesheet">
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
            <li class="active">数据</li>
        </ol>

        <!-- page contents-->
        <div id="page-content" class="page-content homepage">
            <div class="row">
                <div class="col-md-3 widget">
                    <div class="widget-item">
                        <div class="widget-item-left col-md-4">
                            <span class="glyphicon glyphicon-road"></span>
                        </div>
                        <div class="widget-item-right col-md-8">
                            <div class="widget-text">过去一周共走了</div>
                            <div class="widget-text-strong">104.3km</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget">
                    <div class="widget-item">
                        <div class="widget-item-left col-md-4">
                            <span class="glyphicon glyphicon-envelope"></span>
                        </div>
                        <div class="widget-item-right col-md-8">
                            <div class="widget-text">收到了好友来信</div>
                            <div class="widget-text-strong">27封</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 widget">
                    <div class="widget-item">
                        <div class="widget-item-left col-md-4">
                            <span class="glyphicon glyphicon-transfer"></span>
                        </div>
                        <div class="widget-item-right col-md-8">
                            <div class="widget-text">未读动态信息</div>
                            <div class="widget-text-strong">55个</div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">

                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="chart-title">我的运动量</span>
                        </div>
                        <div class="panel-body">
                            <div class="chart" id="sports-chart" ></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="chart-title">我的热度</span>
                        </div>
                        <div class="panel-body">
                            <div class="chart" id="hot-chart" ></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 activity-table">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <span class="chart-title">我的活动</span>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered table-striped activity-table">
                                    <thead>
                                    <tr>
                                        <th width="50%">活动名称</th>
                                        <th width="20%">状态</th>
                                        <th width="30%">进度</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>栖霞山一日游</td>
                                        <td><span class="label label-danger">项目失败</span></td>
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 20%;">27%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>南大后山捉迷藏</td>
                                        <td><span class="label label-warning">募集人员</span></td>
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 40%;">40%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>约球</td>
                                        <td><span class="label label-info">正在进行</span></td>
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>骑行镇江</td>
                                        <td><span class="label label-success">项目结束</span></td>
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>寻找马拉松群众</td>
                                        <td><span class="label label-success">项目结束</span></td>
                                        <td>
                                            <div class="progress progress-small progress-striped active">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">100%</div>
                                            </div>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/plugin/echarts.min.js"></script>
<script src="/js/common.js"></script>
<script src="/js/index.js"></script>
</body>
</html>
