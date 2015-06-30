<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>更改菜单信息</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//引入在线编辑器
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php 
  include("../conn/conn.php");
  $sql1=mysql_query("select * from tb_shangpin where id=".$_GET[id]."",$conn);
  $info1=mysql_fetch_array($sql1);
?>
<body>
<div class="main">
<script language="javascript">
function chkinput(form){
if(form.mingcheng.value==""){alert("请输入菜单名称!");form.mingcheng.select();return(false);}
if(form.huiyuanjia.value==""){alert("请输入菜单会员价!");form.huiyuanjia.select();return(false);}
if(form.shichangjia.value==""){alert("请输入菜单市场价!");form.shichangjia.select();return(false);}
if(form.dengji.value==""){alert("请输入菜单等级!");form.dengji.select();return(false);}
if(form.shuliang.value==""){alert("请输入菜单数量!");form.shuliang.select();return(false);}
return(true);}
</script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="../save/savechangegoods.php?id=<?php echo $_GET[id];?>" onSubmit="return chkinput(this)">

<table>
  <tr>
    <td colspan="2"><div class="main-title">更改菜单信息</div></td>
  </tr>
          <tr>
            <td>名称</td>
            <td><div align="left">
                <input type="text" name="mingcheng" size="25" class="inputcss" value="<?php echo $info1[mingcheng];?>">
            </div></td>
          </tr>
          <tr>
            <td>时间</td>
            <td><div align="left">
                <select name="nian" class="inputcss">
                  <?php 
  for($i=1995;$i<=2050;$i++)
  {
 ?>
                  <option <?php if(substr($info1[addtime],0,4)==$i){echo "selected";}?>><?php echo $i;?></option>
                  <?php 
  }
 ?>
                </select>
                年
                <select name="yue" class="inputcss">
                  <?php 
            for($i=1;$i<=12;$i++)
             {
            ?>
                  <option <?php if(substr($info1[addtime],5,1)==$i){echo "selected";} ?>><?php echo $i;?></option>
                  <?php 
             }
             ?>
                </select>
                月
                <select name="ri" class="inputcss">
                  <?php 
            for($i=1;$i<=31;$i++)
             {
            ?>
                  <option <?php if(substr($info1[addtime],7,1)==$i){echo "selected";} ?>><?php echo $i;?></option>
                  <?php 
             }
             ?>
                </select>
                日</div></td>
          </tr>
          <tr>
            <td>价格</td>
            <td><div align="left">市场价：
                    <input type="text" name="shichangjia" size="10" class="inputcss" value="<?php echo $info1[shichangjia];?>">
                元&nbsp;&nbsp;会员价：
                <input type="text" name="huiyuanjia" size="10" class="inputcss" value="<?php echo $info1[huiyuanjia];?>">
                元</div></td>
          </tr>
          <tr>
            <td>类型</td>
            <td><div align="left">
                <?php
			$sql=mysql_query("select * from tb_type order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "请先添加菜单类型!";
			}
			else
			{
			?>
                <select name="typeid" class="inputcss">
                  <?php
			do
			{
			?>
                  <option value=<?php echo $info[id];?> <?php if($info1[typeid]==$info[id]) {echo "selected";}?>><?php echo $info[typename];?></option>
                  <?php
			}
			while($info=mysql_fetch_array($sql));
			?>
                </select>
                <?php
		     }
		    ?>
            </div></td>
          </tr>
          <tr>
            <td>等级</td>
            <td><div align="left">
                <select name="dengji" class="inputcss">
                  <option value="精品" <?php if(trim($info1[dengji])=="精品"){echo "selected";}?>>精品</option>
                  <option value="一般" <?php if(trim($info1[dengji])=="一般"){echo "selected";}?>>一般</option>
                  <option value="淘汰" <?php if(trim($info1[dengji])=="淘汰"){echo "selected";}?>>淘汰</option>
                </select>
            </div></td>
          </tr>
          <tr>
            <td>子类</td>
            <td><div align="left">
                <select name="tuijian" class="inputcss" >
                  <option value=1 <?php if($info1[tuijian]==1) {echo "selected";}?>>今日推荐</option>
                  <option value=2 <?php if($info1[tuijian]==2) {echo "selected";}?>>新鲜菜式</option>
                  <option value=3 <?php if($info1[tuijian]==3) {echo "selected";}?>>特价套餐</option>
                  <option value=4 <?php if($info1[tuijian]==4) {echo "selected";}?>>营养套餐</option>
                </select>
            </div></td>
          </tr>
          <tr>
            <td>积分</td>
            <td><div align="left">
                <input type="text" name="integral" class="inputcss" size="20" value="<?php echo $info1[integral];?>">
            </div></td>
          </tr>
          <tr>
            <td>数量</td>
            <td><div align="left">
                <input type="text" name="shuliang" class="inputcss" size="20" value="<?php echo $info1[shuliang];?>">
            </div></td>
          </tr>
          <tr>
            <td>图片</td>
            <td><div align="left">
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="upfile" type="file" class="inputcss" id="upfile" size="30">
                <img src="../images/yes.gif" border="0">
            </div></td>
          </tr>
          <tr>
            <td>简介</td>
            <td><div align="left">
<!--            <textarea name="EditorDefault" rows="8" cols="70"></textarea>-->
            	<?php 
			$oFCKeditor = new FCKeditor('EditorDefault'); 
			// FCKeditor所在目录,这个路径一定要和上面那个引入路径一致，否则会报错:找不到fckeditor.html页面 
			$oFCKeditor->BasePath = '../FCKeditor/' ;
			$oFCKeditor->Height = '450px';
			$oFCKeditor->Width = '100%';
			$oFCKeditor->ToolbarSet='Default';
			$oFCKeditor->Value=$info1[jianjie];
			// 将FCKeditor实例化 
			$oFCKeditor->Create() ; 
				?> 
            	
            </div></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" class="buttoncss" value="更改">
              &nbsp;&nbsp;
                <input type="reset" value="重置" class="buttoncss">&nbsp;&nbsp;
                <input type="button" onClick="history.back();" value="返回" class="buttoncss">
            </td>
          </tr>
        
</table></form>
</div>
</body>
</html>
