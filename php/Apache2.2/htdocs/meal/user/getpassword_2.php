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
function chkinput(form){if(form.da.value==""){alert('������������ʾ��!');form.da.select();return(false);}return(true);}
 </script>
</head>
<?php
 include("../conn/conn.php");
?>
<body>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>�������� &gt;&gt; �ڶ������ش�����</td>
            </tr>
            <form name="form2" method="post" action="getpassword_3.php" onSubmit="return chkinput(this)">
            <tr> 
                <td>
                    ������ʾ���⣺
<?php
	  $nc=$_POST[nc];
	  $sql=mysql_query("select * from tb_user where name='".$nc."'",$conn);
	  $info=mysql_fetch_array($sql);
	  if($info==false)
	   {
	     echo "<script>alert('�޴��û�!');history.back();</script>";
		 exit;
	   }
	   else
	   {
	     echo $info[tishi];
	   }
	?>
                </td>
            </tr>
            <tr> 
                <td>
                    ��Ĵ𰸣�<input name="da" type="text" class="inputcss">
                 <input type="hidden" name="nc" value="<?php echo $nc;?>">
                </td>
            </tr>
            <tr> 
                <td>
                    ������䣺<input name="Mail" type="text" class="inputcss">
                </td>
            </tr>
            <tr> 
                <td>
                    <input name="PrevStep" type="button" id="PrevStep" value="��һ��" class="getpassword-submit" onClick="history.go(-1)">
                    <input name="Next" type="submit" id="Next" class="getpassword-submit" value="��һ��">
                    <input name="Cancel" type="reset" id="Cancel" class="getpassword-button" value=" ���� ">
                </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>