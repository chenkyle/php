<?php
include("conn/conn.php");

$title=$_POST[title];
 $content=$_POST[content];
 $time=date("Y-m-j");
 $state=0;
 $sql1=mysql_query("select * from tb_admin where name='".$_SESSION[admin]."'",$conn);
 $info1=mysql_fetch_array($sql1);
 $sid=$info1[id];

while(list($name,$value)=each($_POST))
  {
    mysql_query("insert into tb_message(title,content,state,time,user_id,send_id) values ('$title','$content','$state','$time','$value','$sid')",$conn);
  }
header("location:../adminmessage.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���͹�����Ϣ</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<script language="javascript">
 function chkinput(form){
	 if(form.title.value==""){alert('��������Ϣ����!');form.title.select();return(false);}
	 if(form.content.value==""){alert('��������Ϣ����!');form.content.select();return(false);}
	 return(true);}
</script>
<body>
<div class="main">
<table>
 <form name="form1" method="post" action="sendmessage_1.php" onSubmit="return chkinput(this);">
  <tr>
    <td colspan="2"><div class="main-title" align="left">
    &nbsp;&nbsp;&nbsp;��Ϣ����:&nbsp;&nbsp;&nbsp;
    <a href="sendmessages.php" target="main" style="color: white;">���͹�����Ϣ</a>
    &nbsp;&nbsp;&nbsp;
    <a href="sendmessage.php" target="main" style="color: white;">���û�������Ϣ</a>
    </div></td>
  </tr>
        <tr>
          <td>��Ϣ���⣺</div></td>
          <td><div align="left">
              &nbsp;
              <input type="text" name="title" class="inputcss" size="40">
          </div></td>
        </tr>
        <tr>
          <td>��Ϣ���ݣ�</div></td>
          <td><div align="left">
              &nbsp;
              <textarea style="width: 600px;height: 100px" name="content"></textarea>
          </div></td>
        </tr>
  <tr>
    <td colspan="2">
        <input name="submit" type="submit" class="buttoncss" id="submit" value="�ύ">&nbsp;&nbsp;
        <input type="button" onClick="history.back();" value="����" class="buttoncss">
    </td>
  </tr>
  </form>
</table>

</div>
</body>
</html>
