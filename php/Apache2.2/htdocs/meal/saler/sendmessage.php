<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ϣ����</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<body>
<div class="main">
<?php
       include("conn/conn.php");
       $sql=mysql_query("select count(*) as total from tb_user",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0)
	   {
	     echo "��վ����ע���û�!";
	   }
	   else
	   {
?>
<form name="form1" method="post" action="sendmessage_1.php" target="main">
<table>
  <tr>
    <td colspan="4"><div class="main-title" align="left">
    &nbsp;&nbsp;&nbsp;��Ϣ����:&nbsp;&nbsp;&nbsp;
    <a href="sendmessages.php" target="main" style="color: white;">���͹�����Ϣ</a>
    &nbsp;&nbsp;&nbsp;
    <a href="sendmessage.php" target="main" style="color: white;">ѡ���û�������Ϣ</a>
    </div></td>
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
             $sql1=mysql_query("select * from tb_user order by id desc limit ".($page-1)*$pagesize.",$pagesize ",$conn);
	   ?>
	   <tr class="main-tit">
          <td ><input type="checkbox" name="chkall" id="chkall" onclick="checkall('delete[]')"/><label for="chkall">&nbsp;ȫѡ</label></td>
          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�û���&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ʱ��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><input type="checkbox" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td>
<!--          <a href="look/lookuserinfo.php?id=<?php echo $info1[id];?>">-->
          <?php echo $info1[name];?>
<!--          </a>-->
          </td>
          <td><?php echo $info1[regtime];?></td>
        </tr>
		<?php
	        }
		?>
  <tr>
    <td colspan="7"><div class="main-bottom">
	&nbsp;��վ����ע���û�&nbsp;<?php
		   echo $total;
		  ?>&nbsp;Ϊ&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;Ϊ&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="sendmessage.php?page=1" title="��ҳ"><font face="webdings"> ��ҳ </font></a> 
		<a href="sendmessage.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font face="webdings"> ǰһҳ </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="sendmessage.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="sendmessage.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="sendmessage.php?page=<?php echo $page-1;?>" title="��һҳ"><font face="webdings"> ��һҳ </font></a> 
		<a href="sendmessage.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font face="webdings"> βҳ </font></a>
        <?php }?>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input type="submit" value="������Ϣ" class="buttoncss-del">
	
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
