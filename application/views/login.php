
<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="爱运动，爱生活">
    <meta name="author" content="">
    <link rel="icon" href="/img/icon.ico">

    <title>爱运动管理平台</title>

    <link rel="stylesheet" type="text/css" href="/css/plugin/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/login.css"/>
</head>
<body>

<!-- modal window -->
<div id="modal-signup" class="modal fade container-fluid"  tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">注册</h4>
            </div>
            <form id="form-signup" action="/login/signup" class="form-horizontal" role="form" method="post">
                <div class="modal-body">
                    <div id="form-group-username" class="form-group">
                        <label for="input-signup-username" class="col-md-2 control-label">用户名</label>
                        <div class="col-md-10">
                            <input type="text" id="input-signup-username" class="form-control" name="username">
                        </div>
                    </div>
                    <div id="form-group-password" class="form-group">
                        <label for="input-signup-password" class="col-md-2 control-label">密码</label>
                        <div class="col-md-10">
                            <input type="password" id="input-signup-password" class="form-control" name="password">
                        </div>
                    </div>
                    <div id="form-group-password2" class="form-group">
                        <label for="input-signup-password2" class="col-md-2 control-label">确认密码</label>
                        <div class="col-md-10">
                            <input type="password" id="input-signup-password2" class="form-control" name="password2">
                        </div>
                    </div>
                    <div id="form-group-nickname" class="form-group">
                        <label for="input-signup-nickname" class="col-md-2 control-label">昵称</label>
                        <div class="col-md-10">
                            <input type="text" id="input-signup-nickname" class="form-control" name="nickname">
                        </div>
                    </div>
                    <div id="form-group-email" class="form-group">
                        <label for="input-signup-email" class="col-md-2 control-label">邮箱</label>
                        <div class="col-md-10">
                            <input type="text" id="input-signup-email" class="form-control" name="email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" onclick="signup()">注册</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="login-container">

    <div class="login-box animated fadeInDown">
        <div class="login-logo">
            <img src="/img/logo.png">
        </div>
        <div class="login-body">
            <div class="login-title"><strong>欢迎</strong>, 请登录使用</div>
            <form action="/login/verify" class="form-horizontal" method="post">
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="text" class="form-control" name="username" placeholder="用户名"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <input type="password" class="form-control" name="password" placeholder="密码"/>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6">
                        <a id="button-signup" class="btn btn-link" style="text-align: left" data-toggle="modal"
                           data-target="#modal-signup">注册</a>
                        <a href="#" class="btn btn-link " style="text-align: left">忘记密码</a>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info btn-block" href="home">登录</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="login-footer">
            <div class="pull-left">
                &copy; 2016 爱运动
            </div>
            <div class="pull-right">
                <a href="#">帮助</a> |
                <a href="#">联系我们</a>
            </div>
        </div>
    </div>

</div>
<script src="/js/plugin/jquery.min.js"></script>
<script src="/js/plugin/bootstrap.min.js"></script>
<script src="/js/login.js"></script>
</body>
</html>






