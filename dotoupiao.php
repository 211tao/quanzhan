<?php
header("content-type:text/html;charset=utf8");
$str=file_get_contents("vote.txt");
$arr=explode("|",$str);



$vote=$_GET["vote"];
switch($vote)
{
	case 0:
	$arr[0]++;
	break;
	case 1:
	$arr[1]++;
	break;
	case 2:
	$arr[2]++;
	break;	
	case 3:
	$arr[3]++;
	break;
	case 4:
	$arr[4]++;
	break;
	case 5:
	$arr[5]++;
	break;
	case 6:
	$arr[6]++;
	break;
}
$total=$arr[0]+$arr[1]+$arr[2]+$arr[3]+$arr[4]+$arr[5]+$arr[6];
$pc=round(($arr[0]/$total)*100,2);
$yd=round(($arr[1]/$total)*100,2);
$js=round(($arr[2]/$total)*100,2);
$jq=round(($arr[3]/$total)*100,2);
$bs=round(($arr[4]/$total)*100,2);
$an=round(($arr[5]/$total)*100,2);
$h5=round(($arr[6]/$total)*100,2);
$resultstr=implode("|",$arr);
file_put_contents("vote.txt",$resultstr);
?>
    <h3>各个科目受欢迎的百分比</h3>
    <p>此数据来自网络<?php echo $total;?>份用户投票结果</p>
    <hr>
    <h4>PC端网站重构(<?php echo $pc;?>%)</h4>
    <div class="progress">
        <div class="progress-bar 
           <?php 
					if($pc<25)
					{
						echo "progress-bar-danger";
					}
           		else if($pc<50)
					{
						echo "progress-bar-warning";
					}
           		else if($pc<75)
					{	
						echo "progress-bar-info";
					}
           		else
					{
						echo "progress-bar-success";
					}
           
           ?>
           
            progress-bar-striped" style="width:<?php echo $pc;?>%">
            <span class="sr-only"><?php echo $pc;?>%</span>
        </div>
    </div>
    <h4>移动端网站重构(<?php echo $yd; ?>%)</h4>
    <div class="progress">
        <div class="progress-bar
           <?php
					if($yd<25)
					{
						echo "progress-bar-danger";
					}
					else if($yd<50)
					{
						echo "progress-bar-warning";
					}
					else if($yd<75)
					{
						echo "progress-bar-info";
					}
					else
					{
						echo "progress-bar-success";
					}
					
					?>                                                    
                                                                 
                     progress-bar-striped" style="width:<?php echo $yd ;?>%">
            <span class="sr-only"><?php echo $yd ;?>%</span>
        </div>
    </div>
    <h4>JavaScript(<?php echo $js;?>%)</h4>
    <div class="progress">
        <div class="progress-bar 
           <?php
					if($js<25)
					{
						echo "progress-bar-danger";
					}
					else if($js<50)
					{
						echo "progress-bar-warning";
					}
					else if($js<75)
					{
						echo "progress-bar-info";
					}
					else
					{
						echo "progress-bar-success";
					}										
																				
																									
					?>
           
           
           
           
           
           
           
           
           
           
            progress-bar-striped" style="width:<?php echo $js;?>%">
            <span class="sr-only"><?php echo $js;?>%</span>
        </div>
    </div>
    <h4>JQuery(<?php echo $jq;?>%)</h4>
    <div class="progress">
        <div class="progress-bar 
          <?php
           if($jq<25)
					{
						echo "progress-bar-danger";
					}
					else if($jq<50)
					{
						echo "progress-bar-warning";
					}
					else if($jq<75)
					{
						echo "progress-bar-info";
					}
					else
					{
						echo "progress-bar-success";
					}										
					?>			
            
             
              
               
                
                 
                  
                    progress-bar-striped" style="width:<?php echo $jq;?>%">
            <span class="sr-only"><?php echo $jq;?>%</span>
        </div>
    </div>
    <h4>Bootstrap(<?php echo $bs;?>%)</h4>
    <div class="progress">
        <div class="progress-bar 
          <?php
           if($bs<25)
					{
						echo "progress-bar-danger";
					}
					else if($bs<50)
					{
						echo "progress-bar-warning";
					}
					else if($bs<75)
					{
						echo "progress-bar-info";
					}
					else
					{
						echo "progress-bar-success";
					}										
					?>		
            
             
              
               
                
                 
                  
                   
                     progress-bar-striped" style="width:<?php echo $bs;?>%">
            <span class="sr-only"><?php echo $bs;?>%</span>
        </div>
    </div>
    <h4>Angular(<?php echo $an;?>%)</h4>
    <div class="progress">
        <div class="progress-bar 
           <?php
            if($an<25)
					{
						echo "progress-bar-danger";
					}
					else if($an<50)
					{
						echo "progress-bar-warning";
					}
					else if($an<75)
					{
						echo "progress-bar-info";
					}
					else
					{
						echo "progress-bar-success";
					}										
					?>		
             
              
               
                
                 
                  
                   
                     progress-bar-striped" style="width:<?php echo $an;?>%">
            <span class="sr-only"><?php echo $an;?>%</span>
        </div>
    </div>
    <h4>H5高级教程(<?php echo $h5;?>%)</h4>
    <div class="progress">
        <div class="progress-bar 
          <?php
           if($h5<25)
					{
						echo "progress-bar-danger";
					}
					else if($h5<50)
					{
						echo "progress-bar-warning";
					}
					else if($h5<75)
					{
						echo "progress-bar-info";
					}
					else
					{
						echo "progress-bar-success";
					}										
					?>		
            
             
              
               
                
                 
                  
                    progress-bar-striped" style="width:<?php echo $h5;?>%">
            <span class="sr-only"><?php echo $h5;?>%</span>
        </div>
    </div>