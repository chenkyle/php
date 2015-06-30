<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>投诉列表</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script src="../css/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	if(top.checkBoxList)top.checkBoxList($(".checkBoxList-item"),$(".checkBoxList-btn"));
});
</script>
</head>
<body>
<div class="main">
<?php
       include("../conn/conn.php");
       $sql=mysql_query("select count(*) as total from tb_complain ",$conn);
	   $info=mysql_fetch_array($sql);
	   echo $info[id];

	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无投诉!";
	   }
	   else
	   {echo $info[authority];
?>
<form name="form1" method="post" action="../delete/deletelink.php">
<table>
  <tr>
    <td colspan="5"><div class="main-title">投诉列表</div></td>
  </tr>
       <?php
	     $pagesize=10;
		   if ($total<=$pagesize){
		      $pagecount=1;
			} 
			if(($total%$pagesize)!=0){
			   $pagecount=intval($total/$pagesize)+1;
			}else{
			   $pagecount=$total/$pagesize;
			}
			if(($_GET[page])==""){
			    $page=1;
			}else{
			    $page=intval($_GET[page]);
			}
			
		$sql1=mysql_query("select * from tb_complain ",$conn);
	   ?>
	   <tr class="main-tit">
          <td>投诉编号</td>
          <td>投诉人id</td>
          <td>投诉人姓名</td>
           <td>投诉说明</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>

	      <td><?php echo $info1[id];?></td>
	      <td><?php echo $info1[complainer_id];?></td>    
          <td><?php  $sql2=mysql_query("select * from tb_user where id='$info1[complainer_id]'",$conn);
          			$res=mysql_fetch_array($sql2);
			echo $res[name];?></td>
          <td ><?php  echo $info1[content]; ?></td>

        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;本站共有投诉&nbsp;<?php
		   echo $total;
		  ?>&nbsp;个&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;个&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editadmin.php?page=1" title="首页"><font size="3"> 首页 </font></a> 
		<a href="../edit/editadmin.php?id=<?php echo $linkid;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="../edit/editadmin.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="../edit/editadmin.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="../edit/editadmin.php?page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a> 
		<a href="../edit/editadmin.php?id=<?php echo $linkid;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>	
    </div></td>
  </tr>
</table>
<?php
   }
?>
</form>
</div>
</body>
</html>
