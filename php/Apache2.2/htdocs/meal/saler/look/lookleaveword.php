<html>
<head>
<title>用户留言管理</title>
<link  rel="stylesheet" type="text/css" href="../css/forms.css">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
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
	    include("../function.php");
	   $sql=mysql_query("select count(*) as total from tb_leaveword  ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无用户留言!";
	   }
	   else
	   {
	  
	  ?>
<table>
<form name="form1" method="post" action="../delete/deleteleaveword.php">
  <tr> 
    <td colspan="8"><div class="main-title">用户留言管理</div></td>
  </tr>
        <tr class="main-tit"> 
          <td >留言主题</td>
          <td >留言者</td>
          <td >留言时间</td>
          <td >操作</td>
          <td >删除</td>
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
			 $sql1=mysql_query("select * from tb_leaveword  order by time desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
             while($info1=mysql_fetch_array($sql1))
		     {
		  ?>
        <tr> 
          <td><div align="left"><?php echo unhtml($info1[title]);?></div></td>
          <td>
		  <?php
		   $sql2=mysql_query("select name from tb_user where id='".$info1[userid]."'",$conn);
		   $info2=mysql_fetch_array($sql2);
		   echo $info2[name];
		  ?>
		  </td>
          <td><?php echo $info1[time];?></td>
          <td><a href="../edit/editleaveword.php?id=<?php echo $info1[id];?>">查看</a></td>
          <td>
              <input type="checkbox" class="checkBoxList-item" name=<?php echo $info1[id];?> value=<?php echo $info1[id];?>>
            </td>
        </tr>
		<?php
		 }
		?>
  <tr> 
    <td colspan="5"><div class="main-bottom">
	&nbsp;本站共有用户留言&nbsp;<?php
		   echo $total;
		  ?>&nbsp;条&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;条&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="lookleaveword.php?page=1" title="首页"><font size="3"> 首页 </font></a> 
		<a href="lookleaveword.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="lookleaveword.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="lookleaveword.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="lookleaveword.php?page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a> 
		<a href="lookleaveword.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
        <?php }?>
	
	&nbsp;&nbsp;&nbsp;<input type="submit" value="删除选项" class="buttoncss-del checkBoxList-btn"></div></td>
  </tr>
  </form>
</table>
	<?php
		 }
	?>
	</div>
</body>
</html>
