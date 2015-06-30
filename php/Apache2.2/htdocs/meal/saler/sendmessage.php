<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>消息管理</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<body>
<div class="main">
<?php
       include("conn/conn.php");
       $sql=mysql_query("select count(*) as total from tb_user",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无注册用户!";
	   }
	   else
	   {
?>
<form name="form1" method="post" action="sendmessage_1.php" target="main">
<table>
  <tr>
    <td colspan="4"><div class="main-title" align="left">
    &nbsp;&nbsp;&nbsp;消息管理:&nbsp;&nbsp;&nbsp;
    <a href="sendmessages.php" target="main" style="color: white;">发送公共消息</a>
    &nbsp;&nbsp;&nbsp;
    <a href="sendmessage.php" target="main" style="color: white;">选择用户发送消息</a>
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
             $sql1=mysql_query("select * from tb_user order by id desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
	   ?>
	   <tr class="main-tit">
          <td ><input type="checkbox" name="chkall" id="chkall" onclick="checkall('delete[]')"/><label for="chkall">&nbsp;全选</label></td>
          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用户名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;时间&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><input type="checkbox" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>
<!--          <a href="look/lookuserinfo.php?id=<?php echo $info1[id];?>">-->
          <?php echo $info1[name];?>
<!--          </a>-->
          </td>
          <td><?php echo $info1[regtime];?></td>
        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;本站共有注册用户&nbsp;<?php
		   echo $total;
		  ?>&nbsp;为&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;为&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="sendmessage.php?page=1" title="首页"><font face="webdings"> 首页 </font></a> 
		<a href="sendmessage.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font face="webdings"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="sendmessage.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="sendmessage.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="sendmessage.php?page=<?php echo $page-1;?>" title="后一页"><font face="webdings"> 后一页 </font></a> 
		<a href="sendmessage.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font face="webdings"> 尾页 </font></a>
        <?php }?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="发送消息" class="buttoncss-del">
	
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
