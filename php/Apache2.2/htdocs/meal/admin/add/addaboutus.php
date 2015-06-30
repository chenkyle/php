<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>关于我们</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//引入在线编辑器 
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php include("../conn/conn.php");?>
<script language="javascript">
function chkinput(form){
	if(form.title.value==""){alert("请输入主题!");form.title.select();return(false);}
	//if(form.EditorDefault.value==""){alert("请输入饮食健康信息内容!");form.EditorDefault.select();return(false);}
	return(true);}
</script>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="2"><div class="main-title">添加信息</div></td>
  </tr>
      <form name="form1" method="post" action="../save/savenewaboutus.php" onSubmit="return chkinput(this)">
	  <tr>
        <td>主题</td>
        <td><div align="left"><input type="text" id="title" name="title" size="50" class="inputcss"></div></td>
      </tr>
      <tr>
        <td>内容</div></td>
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
        <td colspan="2">
        <input type="submit" value="添加" class="buttoncss">&nbsp;&nbsp;
        <input type="reset" value="重置" class="buttoncss">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="返回" class="buttoncss">
        </td>
      </tr>
	  </form>
</table>
</div>
</body>
</html>
