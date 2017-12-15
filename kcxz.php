<?php
include"head.php";

?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">课程选择</li>
    </ul>
</div>

<div class="container">
  <div class=" col-md-3">
   <select class="form-control" name="column" onchange="change(this.value)">
   		<option>请选择您要查询的课程</option>
   		<option>Web前端开发</option>
   		<option>UI设计</option>
   		<option>PHP开发</option>
   		<option>JAVA开发</option>
   		<option>网络营销</option>
   </select>
   </div><br>
    <!--<div class="dropdown">
        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">请选择您要查询的课程
        <span class="caret"></span>
        </button>
        <ul class="dropdown-menu" onchange="change(this.value)">
				<li><a href="#">WEB前端开发</a></li>													
				<li><a href="#">UI设计</a></li>													
				<li><a href="#">PHP开发</a></li>													
				<li><a href="#">JAVA开发</a></li>													
				<li><a href="#">网络营销</a></li>													
															
           
            
            
        </ul>
    </div>-->
    <hr>

    <div class="container" id="div">
    </div>
    
</div>
<!--<div class="container">
    <ul class="pager">
        <li class="previous"><a href="dokcxz.php?pageno=<?php echo $currentPage-1;?>" class="btn <?php if($currentPage==1){ echo disabled;}; ?>"><span class="glyphicon glyphicon-arrow-left"></span> Older</a></li>
        <li class="next"><a href="dokcxz.php?pageno=<?php echo $currentPage+1;?> ">Newer <span class="glyphicon glyphicon-arrow-right"></span> </a></li>
    </ul>
</div>-->
<div class="container">
    <div class="foot">
        <p>Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号</p>
    </div>
</div>
</body>
</html>


<script>
	var oDiv=document.getElementById("div");
	
	function change(k)
	{
		if(window.XMLHttpRequest)
			{
				var oAjax=new XMLHttpRequest();
			}
		else{
			var oAjax=new ActiveXObject("Microsoft.XMLHTTP");
		}
		oAjax.open("get","dokcxz.php?q="+k+"&t="+Math.random(),true);//t和&要紧挨着.
		oAjax.send();
		oAjax.onreadystatechange=function()
		{
			if(oAjax.readyState==4&&oAjax.status==200)
				{
					oDiv.innerHTML=oAjax.responseText;
				}
		}
	}
	change("全部内容");

</script>