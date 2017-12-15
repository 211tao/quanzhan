<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
	*{margin:0;padding:0}
	.div1{width:300px;position:absolute;left:50%;top:50%;margin: -100px 0 0 -150px;border: 1px solid gray;height:200px;text-align:  center;}
	.div1 h2{color:white;background: black;line-height: 40px;}
	.div1 h4{line-height: 100px;height:100px;}
</style>
<script src="js/jquery.min.js"></script>
<script>
	window.onload=function()
	{
		var oNum=document.getElementsByTagName("span")[0]
		var timer="";
		var oNums=5
		timer=setInterval(function()
			{
				oNums--;
		        if(oNums==0)
					{
						window.location="<?php echo $jumUrl;?>"
					}
				oNum.innerHTML=oNums;
			}
				
			,1000)
	}
	
</script>	
</head>

<body>
		<div class="div1">
		<h2>提示内容</h2>
		<h4><?php echo $msg."<br>";?></h4>
		<p>
			还需等待<span>5</span>秒,如不想等待,请点击<a href="<?php echo $jumUrl;?>">返回</a>
		</p>
		</div>
</body>
</html>