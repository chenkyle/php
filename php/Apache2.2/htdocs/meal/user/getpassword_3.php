<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>��Ψ˼����ϵͳ</title>
<meta name="description" content="��Ψ˼����ϵͳ." />
<meta name="keywords" content="��Ψ˼,��Ψ˼����ϵͳ" />
<link rel="stylesheet" type="text/css" href="../css/master.css">
<link rel="stylesheet" type="text/css" href="../css/box.css">
<script language="javascript">
function chkinput(form){
	if(form.p1.value==""){alert('������������!');form.p1.select();return(false);}
	if(form.p2.value==""){alert("������ȷ������!");form.p2.select();return(false);}	
	if(form.p1.value.length<6){alert("���볤��С��6!");form.p1.select();return(false);}	
	if(form.p1.value!=form.p2.value){alert("������ȷ�����벻ͬ!");form.p1.select();return(false);}
	return(true);}
 </script>
</head>
<?php
 include("../conn/conn.php");
 $nc=$_POST[nc];
 $da=$_POST[da];
 $sql=mysql_query("select * from tb_user where name='".$nc."'",$conn);
 $info=mysql_fetch_array($sql);
 if($info[huida]!=$da)
 {
   echo "<script>alert('��ʾ���������!');history.back();</script>";
  exit;
 }
 else
 {
?>
<body>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>�������� &gt;&gt; ������������������</td>
            </tr>
            <form name="form1" method="post" action="getpassword_4.php" onSubmit="return chkinput(this)">
            <tr> 
                <td>
                	�������룺<input name="p1" type="password" id="p1" class="inputcss" >
                </td>
            </tr>
            <tr> 
                <td>
                	ȷ�����룺<input name="p2" type="password" id="p2" class="inputcss" >
                </td>
            </tr>
            <tr> 
                <td>
                	<input type="hidden" name="nc" value="<?php echo $nc;?>">
                    <input name="PrevStep" type="button" id="PrevStep" value="��һ��" class="getpassword-submit" onClick="history.go(-1)">
                    <input name="Next" type="submit" id="Next" class="getpassword-submit" value="��һ��">
                    <input name="Cancel" type="reset" id="Cancel" class="getpassword-button" value=" ���� ">
                </td>
            </tr>
            </form>
        </table>
    </div>
    <?php
  }
?>
</body>
</html>