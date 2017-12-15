<?php
	include "php/config.php";
   if(empty($_SESSION["username"])&&empty($_COOKIE["username"]))
   {
	   $msg="请先登录";
	   $jumUrl="login.html";
	   include"tip.php";
	   exit;
   }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>首页</title>
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/gonggong.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#u">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="u">
            <ul class="nav navbar-nav">
                <li><a href="index.php" id="a1">首页<span class="sr-only">(current)</span></a></li>
                <li><a href="qdzx.php">前端咨询</a></li>
                <li><a href="kcxz.php">课程选择</a></li>
                <li><a href="toupiao.php">投票</a></li>
                <li><a href="sousuo.php">搜索</a></li>
                <?php
                if(!empty($_SESSION["username"]))
						{
						?>
							<li><a>欢迎用户<?php echo $_SESSION["username"];?></a></li>
                	 <li><a href="loginout.php">注销</a></li>
                <?php
						}
						else if(!empty($_COOKIE["username"]))
						{
						?>
						<li><a>欢迎用户<?php echo $_COOKIE["username"] ;?></a></li>
                <li><a href="loginout.php">注销</a></li>
							
						<?php			
						} 
							else
							{
						?>
              
               
                <li><a href="register.html">注册</a></li>
                <li><a href="login.html">登录</a></li>
                <?php
							}
						?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden-md"><a href="#">关于我们</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div id="youjiuye" class="carousel side" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#youjiuye" data-slide-to="0" class="active">

            </li>
            <li data-target="youjiuye" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="item active">
                <img src="images/hdp_01.jpg">
            </div>
            <div class="item">
                <img src="images/hdp_02.jpg" >
            </div>
        </div>
        <a class="left carousel-control"  href="#youjiuye" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#youjiuye" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>