<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���۱༭</title>
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
	     echo "��վ�����û���������!";
	   }
	   else
	   {
?>
 <form name="form2" method="post" action="../delete/deletepingjia.php"> 
<table>
  <tr>
    <td colspan="7"><div class="main-title">�û����۱༭</div></td>
  </tr>
      <tr class="main-tit">
      <td>����</td>
        <td>��������</td>
        <td>�˵�����</td>
        <td>������</td>
        <td>����ʱ��</td>
        <td>״̬</td>
        <td>����</td>
        
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
        <td><?php if($info1[isshow]==0)echo "����";else echo "��ʾ";?></td>
        <td><a href="../look/lookpinglun.php?id=<?php echo $info1[id];?>">�鿴</a></td>
        
      </tr>
	   <?php
	        }
		    
		?>
  <tr>
  <td colspan="2" align="left">
	<select name="cz" id="cz">
		
		<option value="1">������ʾ</option>
		<option value="2">��ֹ��ʾ</option>
	</select>
	<input type="submit" value="ȷ��" class="buttoncss checkBoxList-btn">
	</td>
    <td colspan="5" align="right"><div class="main-bottom">
	&nbsp;��վ����������&nbsp;<?php
		   echo $total;
		  ?>&nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editpinglun.php?page=1" title="��ҳ"><font size="3"> ��ҳ </font></a> 
		<a href="../edit/editpinglun.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font size="3"> ǰһҳ </font></a>
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
        <a href="../edit/editpinglun.php?page=<?php echo $page-1;?>" title="��һҳ"><font size="3"> ��һҳ </font></a> 
		<a href="../edit/editpinglun.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font size="3"> βҳ </font></a>
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
