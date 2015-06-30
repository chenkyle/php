<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>用户管理</title>
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
       $sql=mysql_query("select count(*) as total from tb_user ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无用户注册!";
	   }
	   else
	   {
?>
<form name="form1" method="post" action="../delete/deleteuser.php">
<table>
  <tr>
    <td colspan="4"><div class="main-title">用户管理</div></td>
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
             $sql1=mysql_query("select * from tb_user  order by regtime desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
	   ?>
	   <tr class="main-tit">
          <td >用户昵称</td>
          <td >用户状态</td>
          <td >批量</td>
          <td >查看信息</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><?php echo $info1[name];?></td>
          <td >
		  <?php
		    if($info1[dongjie]==0)
			 {
			   echo "未被冻结";
			 }
			 else
			 {
			   echo "已被冻结";
			 }
		  ?>
         </td>
          <td>
          <input type="checkbox" class="checkBoxList-item" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>></td>
          <td><a href="../look/lookuserinfo.php?id=<?php echo $info1[id];?>"><img src="../images/button_select.png" width="14" height="13" border="0"></a></td>
        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;本站共有注册用户&nbsp;<?php
		   echo $total;
		  ?>&nbsp;位&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;位&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/edituser.php?page=1" title="首页"><font size="3"> 首页 </font></a> 
		<a href="../edit/edituser.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="../edit/edituser.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="../edit/edituser.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="../edit/edituser.php?page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a> 
		<a href="../edit/edituser.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="删除选项" class="buttoncss-del checkBoxList-btn">
	
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
