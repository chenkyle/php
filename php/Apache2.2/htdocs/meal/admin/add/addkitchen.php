<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����λó���</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//�������߱༭�� 
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<script language="javascript">
function chkinput(form){if(form.title.value==""){alert("����������!");form.title.select();return(false);}if(form.EditorDefault.value==""){alert("����������!");form.EditorDefault.select();return(false);}return(true);}
</script>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="2"><div class="main-title">����λó���</div></td>
  </tr>
      <form name="form1" method="post" action="../save/savenewkitchen.php" onSubmit="return chkinput(this)">
	  <tr>
        <td>���⣺</td>
        <td><div align="left"><input type="text" name="title" size="50" class="inputcss"></div></td>
      </tr>
      <tr>
        <td>���ݣ�</td>
        <td><div align="left">
<!--        <textarea name="EditorDefault" rows="8" cols="70"></textarea>-->
        <?php 
			$oFCKeditor = new FCKeditor('EditorDefault'); 
			// FCKeditor����Ŀ¼,���·��һ��Ҫ�������Ǹ�����·��һ�£�����ᱨ��:�Ҳ���fckeditor.htmlҳ�� 
			$oFCKeditor->BasePath = '../FCKeditor/' ;
			$oFCKeditor->Height = '450px';
			$oFCKeditor->Width = '100%';
			$oFCKeditor->ToolbarSet='Default';
			// ��FCKeditorʵ���� 
			$oFCKeditor->Create() ; 
		?> </div></td>
      </tr>
      <tr>
        <td colspan="2">
        <input type="submit" value="���" class="buttoncss">&nbsp;&nbsp;
        <input type="reset" value="����" class="buttoncss">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="����" class="buttoncss">
        </td>
      </tr>
	  </form>
</table>
</div>
</body>
</html>
