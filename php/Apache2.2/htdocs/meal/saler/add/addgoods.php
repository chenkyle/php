<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>添加菜单</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//引入在线编辑器 
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php include("../conn/conn.php");?>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="2"><div class="main-title">添加菜单</div></td>
  </tr>
	<script language="javascript">
	function chkinput(form)
	{
	  if(form.mingcheng.value==""){alert("请输入菜单名称!");form.mingcheng.select();return(false);}
	  if(form.huiyuanjia.value==""){alert("请输入菜单会员价!");form.huiyuanjia.select(); return(false);}
	  if(form.shichangjia.value==""){alert("请输入菜单市场价!");form.shichangjia.select();return(false);}
	  if(form.dengji.value=="") {alert("请输入等级!");form.dengji.select(); return(false);}
	   if(form.shuliang.value==""){alert("请输入数量!");form.shuliang.select();return(false);}
	   //if(form.EditorDefault.value==""){alert("请输入简介!");form.EditorDefault.select();return(false);}
	   return(true);
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="../save/savenewgoods.php" onSubmit="return chkinput(this)">
	  <tr>
        <td>名称</td>
        <td><div align="left"><input type="text" name="mingcheng" size="25" class="inputcss"></div></td>
      </tr>
      <tr>
        <td>价格</td>
        <td ><div align="left">市场价：<input type="text" name="shichangjia" size="10" class="inputcss" >
          元&nbsp;&nbsp;会员价：
          <input type="text" name="huiyuanjia" size="10" class="inputcss">
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
              <option value=<?php echo $info[id];?>><?php echo $info[typename];?></option>
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
        <td>等级</div></td>
        <td><div align="left">
          <select name="dengji" class="inputcss">
            <option selected value="精品">精品</option>
            <option value="一般">一般</option>
          </select>
        </div></td>
      </tr>
      <tr>
        <td>子类</div></td>
        <td><div align="left">
          <select name="tuijian" class="inputcss" >
            <option selected value=1>今日推荐</option>
            <option value=2>新鲜菜式</option>
            <option value=3>特价套餐</option>
            <option value=4>营养套餐</option>
          </select>
     </div>
      </td>
      </tr>
      <tr>
        <td>数量</div></td>
        <td><div align="left"><input type="text" name="shuliang" class="inputcss" size="20"></div></td>
      </tr>
      <tr>
        <td>图片</div></td>
        <td><div align="left">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input type="file" name="upfile" class="inputcss" size="30"></div></td>
      </tr>
      <tr>
        <td>简介</div></td>
        <td><div align="left">
<!--        <textarea name="EditorDefault" rows="8" cols="70"></textarea>-->
        <?php 
			$oFCKeditor = new FCKeditor('EditorDefault'); 
			// FCKeditor所在目录,这个路径一定要和上面那个引入路径一致，否则会报错:找不到fckeditor.html页面 
			$oFCKeditor->BasePath = '../FCKeditor/' ;
			$oFCKeditor->Height = '450px';
			$oFCKeditor->Width = '100%';
			$oFCKeditor->ToolbarSet='Default';
			// 将FCKeditor实例化 
			$oFCKeditor->Create() ; 
		?> 
        </div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><input name="submit" type="submit" class="buttoncss" id="submit" value="添加">
        &nbsp;&nbsp;<input type="reset" value="重置" class="buttoncss">&nbsp;&nbsp;
                <input type="button" onClick="history.back();" value="返回" class="buttoncss"></div></td>
      </tr>
	  </form>
</table>
</div>
</body>
</html>
