<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>链接列表</title>
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
       $sql=mysql_query("select count(*) as total from tb_link ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "本站暂无链接!";
	   }
	   else
	   {echo $info[authority];
?>
<form name="form1" method="post" action="../delete/deletelink.php">
<table><tr><td>

<div align="left"><input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='../add/addlink.php';" value="添加新链接"></div>
</td></tr></table>
<table>
  <tr>
    <td colspan="5"><div class="main-title">链接列表</div></td>
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
	  session_start();
	   $adminname=$_SESSION[admin];
	if($adminname!='admin')
		$sql1=mysql_query("select * from tb_link  order by linkid asc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
    else 
        $sql1=mysql_query("select * from tb_link order by linkid asc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
	   ?>
	   <tr class="main-tit">
          <td>链接编号</td>
          <td>链接内容</td>
           <td>链接说明</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><?php echo $info1[linkid];?></td>
          <td ><?php  echo $info1[linkname]; ?></td>
          <td ><?php  echo $info1[linkinfo]; ?></td>
          <td>
          <input name="button" type="button" class="buttoncss" id="button"
			onClick="javascript:window.location='../edit/editlink.php?id=<?php echo $info1[linkid];?>';"
			value="编辑">
          </td>
        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;本站共有链接&nbsp;<?php
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
