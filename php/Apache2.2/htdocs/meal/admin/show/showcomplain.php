<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>Ͷ���б�</title>
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
       $sql=mysql_query("select count(*) as total from tb_complain ",$conn);
	   $info=mysql_fetch_array($sql);
	   echo $info[id];

	   $total=$info[total];
	   if($total==0)
	   {
	     echo "��վ����Ͷ��!";
	   }
	   else
	   {echo $info[authority];
?>
<form name="form1" method="post" action="../delete/deletelink.php">
<table>
  <tr>
    <td colspan="5"><div class="main-title">Ͷ���б�</div></td>
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
			
		$sql1=mysql_query("select * from tb_complain ",$conn);
	   ?>
	   <tr class="main-tit">
          <td>Ͷ�߱��</td>
          <td>Ͷ����id</td>
          <td>Ͷ��������</td>
           <td>Ͷ��˵��</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>

	      <td><?php echo $info1[id];?></td>
	      <td><?php echo $info1[complainer_id];?></td>    
          <td><?php  $sql2=mysql_query("select * from tb_user where id='$info1[complainer_id]'",$conn);
          			$res=mysql_fetch_array($sql2);
			echo $res[name];?></td>
          <td ><?php  echo $info1[content]; ?></td>

        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;��վ����Ͷ��&nbsp;<?php
		   echo $total;
		  ?>&nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editadmin.php?page=1" title="��ҳ"><font size="3"> ��ҳ </font></a> 
		<a href="../edit/editadmin.php?id=<?php echo $linkid;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font size="3"> ǰһҳ </font></a>
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
		<a href="../edit/editadmin.php?id=<?php echo $linkid;?>&page=<?php echo $pagecount;?>" title="βҳ"><font size="3"> βҳ </font></a>
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
