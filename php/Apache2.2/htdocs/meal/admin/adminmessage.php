<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>消息管理</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
<script src="css/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	if(top.checkBoxList)top.checkBoxList($(".checkBoxList-item"),$(".checkBoxList-btn"));
});
</script>
</head>
<body>
<div class="main">
<?php
       include("conn/conn.php");
       $sql=mysql_query("select count(*) as total from tb_message where is_delete<2",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无相关信息!";
	   }
	   else
	   {
?>
<form name="form1" method="post" action="delete/deletemessage.php">
<table>
  <tr>
    <td colspan="4"><div class="main-title" align="left">
    &nbsp;&nbsp;&nbsp;消息管理:&nbsp;&nbsp;&nbsp;
    <a href="sendmessages.php" target="main" style="color: white;">发送公共消息</a>
    &nbsp;&nbsp;&nbsp;
<!--    <a href="#" target="main" style="color: white;">选择用户发送消息</a>-->
    </div></td>
  </tr>
       <?php
	     $pagesize=20;
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
             $sql1=mysql_query("select * from tb_message where is_delete<2 order by time desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
	   ?>
	   <tr class="main-tit">
          <td ><input type="checkbox"  name="chkall" id="chkall" onclick="checkall('delete[]')"/><label for="chkall">&nbsp;删除</label></td>
          <td >标题</td>
          <td >时间</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><input type="checkbox" class="checkBoxList-item" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td><a href="show/showmessage.php?id=<?php echo $info1[id];?>"><?php echo $info1[title];?></a></td>
          <td><?php echo $info1[time];?></td>
        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;本站共有消息&nbsp;<?php
		   echo $total;
		  ?>&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="adminmessage.php?page=1" title="首页"><font size="3"> 首页 </font></a> 
		<a href="adminmessage.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="adminmessage.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="adminmessage.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="adminmessage.php?page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a> 
		<a href="adminmessage.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="删除消息" class="buttoncss-del checkBoxList-btn">
	
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
