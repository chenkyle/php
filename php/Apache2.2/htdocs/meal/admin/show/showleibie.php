<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>菜单类别管理</title>
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
<table><tr><td>
<div align="left"><input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='../add/addleibie.php';" value="添加新类别"></div>
</td></tr></table>
<?php
include("../conn/conn.php");
$sql=mysql_query("select * from tb_type order by id desc",$conn);
$info=mysql_fetch_array($sql);
 if($info==false)
  {
    echo "本站暂无菜单类别!";
   }
  else
  {
?>
<form name="form1" method="post" action="../delete/deletelb.php">
  <table>
   
    <tr>
      <td colspan="3"><div class="main-title">菜单类别管理</div></td>
    </tr>
        <tr class="main-tit">
          <td >类别名称</td>
          <td>操作</td>
          <td>删除</td>
        </tr>
		<?php
		  do
		  {
		?>
        <tr>
          <td><?php echo $info[typename];?></td>
          <td><a href="../edit/editlb.php?lb=<?php echo $info[id];?>">修改</a></td>
          <td><input type="checkbox" class="checkBoxList-item" value=<?php echo $info[id];?> name="<?php echo $info[id];?>"></td>
        </tr>
		<?php
		 }
		 while($info=mysql_fetch_array($sql));
		?>
		<tr>
          <td></td>
          <td colspan="2"><input class="checkBoxList-btn" type="submit" value="删除"></td>
        </tr>
	
  </table></form>
<?php
 }
?>
</div>
</body>
</html>
