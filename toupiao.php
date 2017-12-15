<?php
include"head.php";
?>
<div class="container">
    <ul class="breadcrumb">
        <li><a href="index.php">首页</a></li>
        <li class="active">投票</li>
    </ul>
</div>
    
		<div class="container" id="div1">
			<h3>请选择你喜欢的课程</h3>
    <p>你觉得你比较喜欢下列哪个课程,请选择</p>
    <hr>
    <form class="form-group">
        <label>
            <input type="radio" name="kc" value="0" checked>PC端网站重构
        </label><br>
        <label>
            <input type="radio" name="kc" value="1"> 移动端网站重构
        </label><br>
            <label>
                <input type="radio" name="kc" value="2">JavaScript
            </label><br>
           <label>
               <input type="radio" name="kc" value="3">JQuery
           </label><br>
            <label>
                <input type="radio" name="kc" value="4">Bootstrap
            </label><br>
        <label>
            <input type="radio" name="kc" value="5">Angular
        </label><br>
        <label>
            <input type="radio" name="kc" value="6">H5高级教程
        </label><br>
            <button type="button" class="btn btn-success" id="btn">投票</button>
        </form>
		</div>
<div class="container">
    <div class="foot">
         <p>Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号</p>
    </div>
</div>

<script>
	var oDiv=document.getElementById("div1");
	var oBtn=document.getElementById("btn");
	var oKc=document.getElementsByName("kc");
	var vote="";
	oBtn.onclick=function()
	{
		

	for(var i=0;i<oKc.length;i++)
		{
			if(oKc[i].checked)
				{
					vote=oKc[i].value;
				}
		}
	
	
	
	
	
		if(window.XMLHttpRequest)
			{
				var oAjax=new XMLHttpRequest();
			}
		else
			{
				var oAjax=new ActiveXObject("Microsoft.XMLHTTP");
			}
		oAjax.open("get","dotoupiao.php?t="+Math.random()+" & vote="+vote,true);
		oAjax.send();
		oAjax.onreadystatechange=function()
		{
			if(oAjax.readyState==4&&oAjax.status==200)
				{
					oDiv.innerHTML=oAjax.responseText;
					
				}
		}

	}
</script>
