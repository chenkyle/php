<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>编辑梦幻厨房</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//引入在线编辑器 
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php
 include("../conn/conn.php");
 $sql=mysql_query("select * from tb_kitchen where id=".$_GET[id]."",$conn);      
 $info=mysql_fetch_array($sql);
?>
<script language="javascript">
function chkinput(form){if(form.title.value==""){alert("请输入主题!");form.title.select();return(false);}if(form.EditorDefault.value==""){alert("请输入内容!");form.EditorDefault.select();return(false);}return(true);}
</script>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="2"><div class="main-title">查看修改梦幻厨房信息</div></td>
  </tr>
       <form name="form1" method="post" action="../save/saveeditkitchen.php" onSubmit="return chkinput(this)">
	  <tr>
        <td>主题</td>
        <td><div align="left"><input type="text" name="title" size="50" class="inputcss" value="<?php echo $info[title];?>"></div></td>
      </tr>
      <tr>
        <td>内容：</td>
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
		?> </div></td>
      </tr>
      <tr>
        <td colspan="2"><input type="hidden" name="id" value="<?php echo $_GET[id];?>"><input type="submit" value="更改" class="buttoncss">&nbsp;&nbsp;<input type="reset" value="重置" class="buttoncss"></td>
      </tr>
	  </form>
</table>
</div>
</body>
</html>
