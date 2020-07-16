<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>前台首页</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">前台首页</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="JavaScript:;"><span class="glyphicon glyphicon-user"></span> 欢迎{{session('loginInfo')['l_name']}}登陆</a></li>
            <li><a href="/index/UserInfo"><span class="glyphicon glyphicon-user"></span> 个人中心</a></li>
            <li><a href="/login/logout"><span class="glyphicon glyphicon-user"></span> 退出</a></li>
        </ul>
    </div>
</nav>
</body>
</html>