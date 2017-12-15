<?php
include"head.php";
	
?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">搜索</li>
    </ul>
</div>
    <div class="container text-center" style="margin-top:100px">
        <form class="form-inline form-search" method="get" action="dosearch.php">
            <div class="form-group">
                <input type="search" class="form-control" placeholder="请输入要搜索的内容" name="search">
                <button type="submit" class="btn btn-default">搜索</button>
            </div>
        </form>
    </div>
<div class="container">
    <div class="panel-footer" style="margin-top:50px">
        Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号
	 </div>
</div>
</body>
</html>