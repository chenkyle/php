<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����Ա�б�</title>
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
       $sql=mysql_query("select count(*) as total from tb_admin ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "��վ���޹���Ա!";
	   }
	   else
	   {echo $info[authority];
?>
<form name="form1" method="post" action="../delete/deleteadmin.php">
<table><tr><td>

<?php 
$types='kongbai';
if($_SESSION[$adminname]='admin')
	$types='��ӹ���Ա';
else 
	$types="";
?>
<div align="left"><input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='../add/addadmin.php';" value="<?php echo "$types"; ?>"></div>
</td></tr></table>
<table>
  <tr>
    <td colspan="5"><div class="main-title">����Ա�б�</div></td>
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
		$sql1=mysql_query("select * from tb_admin where name='$adminname' order by id asc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
    else 
        $sql1=mysql_query("select * from tb_admin order by id asc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
	   ?>
	   <tr class="main-tit">
          <td>�û���</td>
          <td>Email</td>
          <td>����ʱ��</td>
          <td>����</td>
          <td>����</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><?php echo $info1[name];?></td>
          <td ><?php  echo $info1[email]; ?></td>
          <td ><?php  echo $info1[time]; ?></td>
          <td>
          <input name="button" type="button" class="buttoncss" id="button"
			onClick="javascript:window.location='../add/addadmin.php?id=<?php echo $info1[id];?>';"
			value="�༭">
          </td>
          <td>
          <input type="checkbox" class="checkBoxList-item" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>></td>
        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;��վ���й���Ա&nbsp;<?php
		   echo $total;
		  ?>&nbsp;λ&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;λ&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editadmin.php?page=1" title="��ҳ"><font size="3"> ��ҳ </font></a> 
		<a href="../edit/editadmin.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font size="3"> ǰһҳ </font></a>
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
        <a href="../edit/editadmin.php?page=<?php echo $page-1;?>" title="��һҳ"><font size="3"> ��һҳ </font></a> 
		<a href="../edit/editadmin.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font size="3"> βҳ </font></a>
        <?php }?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" value="ɾ��ѡ��" class="buttoncss-del checkBoxList-btn">
	
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
