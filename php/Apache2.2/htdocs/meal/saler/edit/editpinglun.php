<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>评论编辑</title>
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
       $sql=mysql_query("select count(*) as total from tb_pingjia ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无用户发表评论!";
	   }
	   else
	   {
?>
 <form name="form2" method="post" action="../delete/deletepingjia.php"> 
<table>
  <tr>
    <td colspan="7"><div class="main-title">用户评论编辑</div></td>
  </tr>
      <tr class="main-tit">
      <td>批量</td>
        <td>评论主题</td>
        <td>菜单名称</td>
        <td>评论者</td>
        <td>评论时间</td>
        <td>状态</td>
        <td>操作</td>
        
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
             $sql1=mysql_query("select * from tb_pingjia order by time desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
             while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
      <tr>
      <td><input type="checkbox" class="checkBoxList-item" value=<?php echo $info1[id]?> name="<?php echo $info1[id];?>"></td>
        <td><div align="left"><?php echo $info1[title];?></div></td>
        <td>
		<?php
		  $sql2=mysql_query("select * from tb_shangpin where id='".$info1[spid]."'",$conn);
		  $info2=mysql_fetch_array($sql2);
		  echo $info2[mingcheng];
		?></td>
        <td>
		<?php
		  $sql3=mysql_query("select * from tb_user where id='".$info1[userid]."'",$conn);
		  $info3=mysql_fetch_array($sql3);
		  echo $info3[name];
		?>
		</td>
        <td><?php echo $info1[time];?></td>
        <td><?php if($info1[isshow]==0)echo "隐藏";else echo "显示";?></td>
        <td><a href="../look/lookpinglun.php?id=<?php echo $info1[id];?>">查看</a></td>
        
      </tr>
	   <?php
	        }
		    
		?>
  <tr>
  <td colspan="2" align="left">
	<select name="cz" id="cz">
		
		<option value="1">允许显示</option>
		<option value="2">禁止显示</option>
	</select>
	<input type="submit" value="确定" class="buttoncss checkBoxList-btn">
	</td>
    <td colspan="5" align="right"><div class="main-bottom">
	&nbsp;本站共有用评论&nbsp;<?php
		   echo $total;
		  ?>&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editpinglun.php?page=1" title="首页"><font size="3"> 首页 </font></a> 
		<a href="../edit/editpinglun.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="../edit/editpinglun.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="../edit/editpinglun.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="../edit/editpinglun.php?page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a> 
		<a href="../edit/editpinglun.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>
	</div></td>
  </tr>
</table>
 </form>
<?php
  }
?>
</div>
</body>
</html>
