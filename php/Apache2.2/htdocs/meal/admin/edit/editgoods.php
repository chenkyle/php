<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>编辑菜单</title>
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
<div align="left"><input name="button" type="button" class="buttoncss-del" id="button" onClick="javascript:window.location='../add/addgoods.php';" value="添加新菜单"></div>
</td></tr></table>
<?php
	   $sql=mysql_query("select count(*) as total from tb_shangpin ",$conn);
	   $info=mysql_fetch_array($sql);
	   $total=$info[total];
	   if($total==0){
	     echo "本站暂无菜单!";
	   }
	   else
	    {
?>
<form name="form1" method="post" action="../delete/deletefxhw.php">
  <table>
	  <tr>
        <td colspan="8"><div class="main-title">菜单信息编辑</div></td>
      </tr>
      <tr class="main-tit">
        <td>复选</td>
        <td>名称</td>
        <td>剩余</td>
        <td>市场价</td>
        <td>会员价</td>
        <td>卖出</td>
        <td>加入时间</td>
        <td >操作</td>
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
        <td><?php if($info1[shuliang]<0) {echo "售完";}else {echo $info1[shuliang];}?></td>
        <td><?php echo $info1[shichangjia];?></td>
        <td><?php echo $info1[huiyuanjia];?></td>
        <td><?php echo $info1[cishu];?></td>
        <td><?php echo $info1[addtime];?></td>
        <td ><a href="../change/changegoods.php?id=<?php echo $info1[id];?>">更改</a></td>
      </tr>
	 <?php
	    }
        
      ?>
  <tr>
    <td colspan="8"><div class="main-bottom">
	  <input name="submit" type="submit" class="buttoncss-del checkBoxList-btn" id="submit" value="删除选择">
	  &nbsp;<input type="reset" value="重新选择" class="buttoncss-del">
    &nbsp;&nbsp;&nbsp;&nbsp;本站共有
        <?php
		   echo $total;
		  ?>
        &nbsp;道菜&nbsp;每页显示&nbsp;<?php echo $pagesize;?>&nbsp;道&nbsp;第&nbsp;<?php echo $page;?>&nbsp;页/共&nbsp;<?php echo $pagecount; ?>&nbsp;页
        <?php
		  if($page>=2)
		  {
		  ?>
        <a href="../edit/editgoods.php?page=1" title="首页"><font size="3"> 首页 </font></a> <a href="../edit/editgoods.php?id=<?php echo $id;?>&page=<?php echo $page-1;?>" title="前一页"><font size="3"> 前一页 </font></a>
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
        <a href="../edit/editgoods.php?page=<?php echo $page-1;?>" title="后一页"><font size="3"> 后一页 </font></a> <a href="../edit/editgoods.php?id=<?php echo $id;?>&page=<?php echo $pagecount;?>" title="尾页"><font size="3"> 尾页 </font></a>
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
