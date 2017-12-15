<?php
include "head.php";
date_default_timezone_set("Asia/Shanghai");
$jumUrl="login.html";
$id=$_GET["id"];
$sql="SELECT * FROM list WHERE id =".$id;
$result=$conn->query($sql);
$row=$result->fetch_assoc();
?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li><a href="qdzx.php"><?php echo $row["column"];?></a></li>
        
    </ul>
</div>
<div class="container">
    <h3 class="text-center"><?php echo $row["title"];?></h3>
    <p class="text-center" >作者:<span class="bg-primary"><?php echo $row["author"];?></span>发布日期:<time class="bg-primary"><?php echo date("Y-m-d H:i:s",$row["reg_date"]);?></time></p>
    <hr>
    <!--<p>
        
    </p>-->
    <?php echo $row["content"];?>
    
</div>


<div class="container">
    <ul class="list-group">
        <li class="list-group-item text-info" id="li1">相关文章</li>
        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-star-empty"></span> 2016年1月28日荣获：大众点评2015"十佳职业技术培训品牌奖"</a></li>
        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-star-empty"></span> 2016年1月28日荣获：大众点评2015"十佳职业技术培训品牌奖"</a></li>
        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-star-empty"></span> 2016年1月28日荣获：大众点评2015"十佳职业技术培训品牌奖"</a></li>
        <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-star-empty"></span> 2016年1月28日荣获：大众点评2015"十佳职业技术培训品牌奖"</a></li>
    </ul>
</div>
<div class="container">
    <div class="foot">
        <p>Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号</p>
    </div>
</div>
</body>
</html>