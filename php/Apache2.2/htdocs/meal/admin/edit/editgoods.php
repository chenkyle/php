<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>�༭�˵�</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script src="../css/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	if(top.checkBoxList)top.checkBoxList($(".checkBoxList-item"),$(".checkBoxList-btn"));
});
</script>
</head>
<?php
  include("../conn/conn.php");
?>
<body>
<div class="main">
<table><tr><td>
<div align="left"><input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='../add/addgoods.php';" value="����²˵�"></div>
</td></tr></table>
<?php
	   $sql=mysql_query("select count(*) as total from tb_shangpin ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0){
	     echo "��վ���޲˵�!";
	   }
	   else
	    {
?>
<form name="form1" method="post" action="../delete/deletefxhw.php">
  <table>
	  <tr>
        <td colspan="8"><div class="main-title">�˵���Ϣ�༭</div></td>
      </tr>
      <tr class="main-tit">
        <td>��ѡ</td>
        <td>����</td>
        <td>ʣ��</td>
        <td>�г���</td>
        <td>��Ա��</td>
        <td>����</td>
        <td>����ʱ��</td>
        <td >����</td>
      </tr>
	  <?php
	       $pagesize=15;
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
           $sql1=mysql_query("select * from tb_shangpin order by addtime desc limit ".($page-1)*$pagesize.",$pagesize",$conn);
		   while($info1=mysql_fetch_array($sql1))
		    {
	  ?>
      <tr>
        <td>
          <input type="checkbox" class="checkBoxList-item" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>>
        </td>
        <td><?php echo $info1[mingcheng];?></td>
        <td><?php if($info1[shuliang]<0) {echo "����";}else {echo $info1[shuliang];}?></td>
        <td><?php echo $info1[shichangjia];?></td>
        <td><?php echo $info1[huiyuanjia];?></td>
        <td><?php echo $info1[cishu];?></td>
        <td><?php echo $info1[addtime];?></td>
        <td ><a href="../change/changegoods.php?id=<?php echo $info1[id];?>">����</a></td>
      </tr>
	 <?php
	    }
        
      ?>
  <tr>
    <td colspan="8"><div class="main-bottom">
	  <input name="submit" type="submit" class="buttoncss-del checkBoxList-btn" id="submit" value="ɾ��ѡ��">
	  &nbsp;<input type="reset" value="����ѡ��" class="buttoncss-del">
    &nbsp;&nbsp;&nbsp;&nbsp;��վ����
        <?php
		   echo $total;
		  ?>
        &nbsp;����&nbsp;ÿҳ��ʾ&nbsp;<?php echo $pagesize;?>&nbsp;��&nbsp;��&nbsp;<?php echo $page;?>&nbsp;ҳ/��&nbsp;<?php echo $pagecount; ?>&nbsp;ҳ
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editgoods.php?page=1" title="��ҳ"><font size="3"> ��ҳ </font></a> <a href="../edit/editgoods.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="ǰһҳ"><font size="3"> ǰһҳ </font></a>
        <?php
		  }
		   if($pagecount<=4){
		    for($i=1;$i<=$pagecount;$i++){
		  ?>
        <a href="../edit/editgoods.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php
		     }
		   }else{
		   for($i=1;$i<=4;$i++){	 
		  ?>
        <a href="../edit/editgoods.php?page=<?php echo $i;?>"><?php echo $i;?></a>
        <?php }?>
        <a href="../edit/editgoods.php?page=<?php echo $page-1;?>" title="��һҳ"><font size="3"> ��һҳ </font></a> <a href="../edit/editgoods.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="βҳ"><font size="3"> βҳ </font></a>
        <?php }?>
    </td>
  </tr>
</table>
</form>
  <?php
	}
  ?>
  </div>
</body>
</html>
