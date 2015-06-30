<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>公告管理</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
<script src="css/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	if(top.checkBoxList)top.checkBoxList($(".checkBoxList-item"),$(".checkBoxList-btn"));
});
</script>
</head>
<body><div class="main">
<table><tr><td>
<div align="left"><input name="button2" type="button" class="buttoncss-del" id="button2" onClick="javascript:window.location='add/addgonggao.php';" value="添加新公告"></div>
</td></tr></table>
<?php
       include("conn/conn.php");
       $sql=mysql_query("select count(*) as total from tb_gonggao ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无公告!";
	   }
	   else
	   {
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
           $sql1=mysql_query("select * from tb_gonggao order by time desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
?>
<form name="form1" method="post" action="delete/deletegonggao.php">
<table>
  <tr>
    <td colspan="3"><div class="main-title">公告管理</div></td>
  </tr>
      <tr class="main-tit">
        <td>复选</td>
        <td>公告主题</td>
        <td>操作</td>
      </tr>
	    <?php
		   while($info1=mysql_fetch_array($sql1))
		    {
	  ?>
	  <tr>
        <td><input type="checkbox" class="checkBoxList-item" name=<?php echo $info1[id];?> value=<?php echo $info1[id];?>></td>
        <td><?php echo $info1[title];?></td>
	    <td>
	    <input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='edit/editgonggao.php?id=<?php echo $info1[id];?>';" value="查看编辑">
	    </td>
	  </tr>
	  <?php
	       }
	  ?>
  <tr>
    <td colspan="3"><input type="submit" value="删除所选项" class="buttoncss-del checkBoxList-btn">&nbsp;&nbsp;<input type="reset" value="取消删除" class="buttoncss-del">
	 &nbsp;&nbsp;&nbsp; 本站共有公告
	 <?php
		   echo $total;
		  ?>
        &nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="admingonggao.php?id=<?php echo $id;?>&page=1" title="首页"><font size="3"> 首页 </font></a> 
		<a href="admingonggao.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="admingonggao.php?id=<?php echo $id;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="admingonggao.php?id=<?php echo $id;?>&page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="admingonggao.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a>
		 <a href="admingonggao.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>
		</td>
  </tr>
</table>
<?php
 }
?>
</form></div>
</body>
</html>
