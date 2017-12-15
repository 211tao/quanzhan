<?php
$jumUrl="login.html";
include"head.php";
?>
<div class="container">
    <h3><strong>Web</strong>前端课程推荐</h3>
    <p>这些项目或者是对Bootstrap进行了有益的补充，或者是基于Bootstrap开发的</p>
    <hr>
</div>
<div class="container">
    <div class="row">
     <?php  
     
			$sql="SELECT * FROM list ORDER BY id DESC limit 8";
			$result=$conn->query($sql);
			if($result->num_rows)
			{
				while($row=$result->fetch_assoc())
				{
	   ?>
        	<div class="col-md-3 col-xs-6">
            <div class="thumbnail">
                <a href="content.php?id=<?php echo $row["id"];?>"><img src="<?php echo $row["thumb"];?>" title="<?php echo $row["title"];?>"></a>
            <div class="caption">
                <h4 class="text-info"><a href="content.php?id=<?php echo $row["id"];?>" title="<?php echo $row["description"];?>"><?php echo mb_substr($row["description"],0,12,"utf8")."...";?></a></h4>
                <p><a href="liebiao.php?column=<?php echo $row["column"];?>" ><?php echo $row["column"];?></a></p>
                <p>
                    <?php  echo mb_substr($row["description"],0,20,"utf8")."...";?>
                </p>
            </div>
            </div>
        </div>
        <?php
				}
		}
		else
		{
			echo "没有数据";
		}
			?>
	</div>
	</div>   
    <div class="container">
        <h3><strong>Web</strong>前端课程选择</h3>
        <p>这些项目或者是对Bootstrap进行了有益的补充，或者是基于Bootstrap开发的</p>
        <hr>


        <table class="table table-bordered table-condensed">
            <thead>
                <tr>
                    <th>班级名称</th>
                    <th>课时</th>
                    <th>价格</th>
                    <th>免费试听</th>
                    <th>购买课程</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>就业精品班(面授/封闭班/包食宿)</td>
                    <td>4个月</td>
                    <td>优惠价17800.00<del>原价19800.00</del></td>
                    <td><span class="glyphicon glyphicon-headphones"> 预约</span></td>
                    <td><button type="button" class="btn btn-danger btn-sm">立即报名</button></td>
                </tr>
                <tr>
                    <td>就业精品班(面授/封闭班/包食宿)</td>
                    <td>4个月</td>
                    <td>优惠价17800.00<del>原价19800.00</del></td>
                    <td><span class="glyphicon glyphicon-headphones "> 预约</span></td>
                    <td><button type="button" class="btn btn-danger btn-sm">立即报名</button></td>
                </tr>
                <tr>
                    <td>就业精品班(面授/封闭班/包食宿)</td>
                    <td>4个月</td>
                    <td>优惠价17800.00<del>原价19800.00</del></td>
                    <td><span class="glyphicon glyphicon-headphones "> 预约</span></td>
                    <td><button type="button" class="btn btn-danger btn-sm">立即报名</button></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="container">
        <div class="foot">
            <p>Copyright1999-2016北京中公教育科技股份有限公司.All Rights Reserved 京ICP证161188号</p>
        </div>
    </div>
</body>
</html>