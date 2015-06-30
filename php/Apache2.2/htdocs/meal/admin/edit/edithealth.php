<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>编辑饮食健康信息</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//引入在线编辑器 
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php
 include("../conn/conn.php");
 $sql=mysql_query("select * from tb_health where id=".$_GET[id]."",$conn);      
 $info=mysql_fetch_array($sql);
?>
<script language="javascript">
  function chkinput(form){if(form.title.value==""){alert("请输入主题!");form.title.select();return(false);}
  //if(form.EditorDefault.value==""){alert("请输入内容!");form.EditorDefault.select();return(false);}
  return(true);}
</script>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="2"><div class="main-title">查看修改饮食健康信息</div></td>
  </tr>
       <form name="form1" method="post" action="../save/saveedithealth.php" onSubmit="return chkinput(this)">
	  <tr>
        <td >主题</td>
        <td><div align="left"><input type="text" id="title" name="title" size="50" class="inputcss" value="<?php echo $info[title];?>"></div></td>
      </tr>
      <tr>
        <td>类型</td>
        <td><div align="left">
           <?php
			$sql1=mysql_query("select * from tb_health_type order by id desc",$conn);
			$info1=mysql_fetch_array($sql1);
			if($info1==false)
			{
			  echo "请先添加饮食健康类型!";
			}
			else
			{
			?>
            <select name="typeid" class="inputcss">
			<?php
			do
			{
			?>
              <option value=<?php echo $info1[id];?>><?php echo $info1[typename];?></option>
			<?php
			}
			while($info1=mysql_fetch_array($sql1));
			?>  
            </select>
            <?php
		     }
		    ?>
        </div></td>
      </tr>
      <tr>
        <td>内容</td>
        <td><div align="left">
<!--        <textarea name="EditorDefault" rows="8" cols="70"></textarea>-->
        <?php 
			$oFCKeditor = new FCKeditor('EditorDefault'); 
			// FCKeditor所在目录,这个路径一定要和上面那个引入路径一致，否则会报错:找不到fckeditor.html页面 
			$oFCKeditor->BasePath = '../FCKeditor/' ;
			$oFCKeditor->Height = '450px';
			$oFCKeditor->Width = '100%';
			$oFCKeditor->ToolbarSet='Default';
			$oFCKeditor->Value=$info[content];
			// 将FCKeditor实例化 
			$oFCKeditor->Create() ; 
		?> 
        </div></td>
      </tr>
      <tr>
        <td colspan="2"><input type="hidden" name="id" value="<?php echo $_GET[id];?>"><input type="submit" value="更改" class="buttoncss">&nbsp;&nbsp;<input type="reset" value="重置" class="buttoncss"></td>
      </tr>
	  </form>
</table>
</div>
</body>
</html>
