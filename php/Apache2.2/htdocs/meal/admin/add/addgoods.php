<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ӳ˵�</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//�������߱༭�� 
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php include("../conn/conn.php");?>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="2"><div class="main-title">��Ӳ˵�</div></td>
  </tr>
	<script language="javascript">
	function chkinput(form)
	{
	  if(form.mingcheng.value==""){alert("������˵�����!");form.mingcheng.select();return(false);}
	  if(form.huiyuanjia.value==""){alert("������˵���Ա��!");form.huiyuanjia.select(); return(false);}
	  if(form.shichangjia.value==""){alert("������˵��г���!");form.shichangjia.select();return(false);}
	  if(form.dengji.value=="") {alert("������ȼ�!");form.dengji.select(); return(false);}
	   if(form.shuliang.value==""){alert("����������!");form.shuliang.select();return(false);}
	   //if(form.EditorDefault.value==""){alert("��������!");form.EditorDefault.select();return(false);}
	   return(true);
	}
    </script>
     <form name="form1" enctype="multipart/form-data" method="post" action="../save/savenewgoods.php" onSubmit="return chkinput(this)">
	  <tr>
        <td>����</td>
        <td><div align="left"><input type="text" name="mingcheng" size="25" class="inputcss"></div></td>
      </tr>
      <tr>
        <td>�۸�</td>
        <td ><div align="left">�г��ۣ�<input type="text" name="shichangjia" size="10" class="inputcss" >
          Ԫ&nbsp;&nbsp;��Ա�ۣ�
          <input type="text" name="huiyuanjia" size="10" class="inputcss">
          Ԫ</div></td>
      </tr>
      <tr>
        <td>����</td>
        <td><div align="left">
			<?php
			$sql=mysql_query("select * from tb_type order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "������Ӳ˵�����!";
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
        <td>�ȼ�</div></td>
        <td><div align="left">
          <select name="dengji" class="inputcss">
            <option selected value="��Ʒ">��Ʒ</option>
            <option value="һ��">һ��</option>
          </select>
        </div></td>
      </tr>
      <tr>
        <td>����</div></td>
        <td><div align="left">
          <select name="tuijian" class="inputcss" >
            <option selected value=1>�����Ƽ�</option>
            <option value=2>���ʲ�ʽ</option>
            <option value=3>�ؼ��ײ�</option>
            <option value=4>Ӫ���ײ�</option>
          </select>
     </div>
      </td>
      </tr>
      <tr>
        <td>����</div></td>
        <td><div align="left"><input type="text" name="shuliang" class="inputcss" size="20"></div></td>
      </tr>
      <tr>
        <td>ͼƬ</div></td>
        <td><div align="left">
		<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
        <input type="file" name="upfile" class="inputcss" size="30"></div></td>
      </tr>
      <tr>
        <td>���</div></td>
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
		?> 
        </div></td>
      </tr>
      <tr>
        <td colspan="2"><div align="center"><input name="submit" type="submit" class="buttoncss" id="submit" value="���">
        &nbsp;&nbsp;<input type="reset" value="����" class="buttoncss">&nbsp;&nbsp;
                <input type="button" onClick="history.back();" value="����" class="buttoncss"></div></td>
      </tr>
	  </form>
</table>
</div>
</body>
</html>
