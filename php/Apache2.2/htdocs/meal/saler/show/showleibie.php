<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�˵�������</title>
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
<div align="left"><input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='../add/addleibie.php';" value="��������"></div>
</td></tr></table>
<?php
include("../conn/conn.php");
$sql=mysql_query("select * from tb_type order by id desc",$conn);
$info=mysql_fetch_array($sql);
 if($info==false)
  {
    echo "��վ���޲˵����!";
   }
  else
  {
?>
<form name="form1" method="post" action="../delete/deletelb.php">
  <table>
   
    <tr>
      <td colspan="3"><div class="main-title">�˵�������</div></td>
    </tr>
        <tr class="main-tit">
          <td >�������</td>
          <td>����</td>
          <td>ɾ��</td>
        </tr>
		<?php
		  do
		  {
		?>
        <tr>
          <td><?php echo $info[typename];?></td>
          <td><a href="../edit/editlb.php?lb=<?php echo $info[id];?>">�޸�</a></td>
          <td><input type="checkbox" class="checkBoxList-item" value=<?php echo $info[id];?> name="<?php echo $info[id];?>"></td>
        </tr>
		<?php
		 }
		 while($info=mysql_fetch_array($sql));
		?>
		<tr>
          <td></td>
          <td colspan="2"><input class="checkBoxList-btn" type="submit" value="ɾ��"></td>
        </tr>
	
  </table></form>
<?php
 }
?>
</div>
</body>
</html>
