<html>
<head>
<title>�û����Թ���</title>
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
	     echo "��վ�����û�����!";
	   }
	   else
	   {
	  
	  ?>
<table>
<form name="form1" method="post" action="../delete/deleteleaveword.php">
  <tr> 
    <td colspan="8"><div class="main-title">�û����Թ���</div></td>
  </tr>
        <tr class="main-tit"> 
          <td >��������</td>
          <td >������</td>
          <td >����ʱ��</td>
          <td >����</td>
          <td >ɾ��</td>
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
          <td><a href="../edit/editleaveword.php?id=<?php echo $info1[id];?>">�鿴</a></td>
          <td>
              <input type="checkbox" class="checkBoxList-item" name=<?php echo $info1[id];?> value=<?php echo $info1[id];?>>
            </td>
        </tr>
		<?php
		 }
		?>
  <tr> 
    <td colspan="5"><div class="main-bottom">
	&nbsp;��վ�����û�����&nbsp;<?php
		   echo $total;
		  ?>&nbsp;��&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="lookleaveword.php?page=1" title="��ҳ"><font size="3"> ��ҳ </font></a> 
		<a href="lookleaveword.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font size="3"> ǰһҳ </font></a>
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
        <a href="lookleaveword.php?page=<?php echo $page-1;?>" title="��һҳ"><font size="3"> ��һҳ </font></a> 
		<a href="lookleaveword.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font size="3"> βҳ </font></a>
        <?php }?>
	
	&nbsp;&nbsp;&nbsp;<input type="submit" value="ɾ��ѡ��" class="buttoncss-del checkBoxList-btn"></div></td>
  </tr>
  </form>
</table>
	<?php
		 }
	?>
	</div>
</body>
</html>
