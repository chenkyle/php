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
</head>
<?php
 include("../conn/conn.php");
 $nc=$_POST[nc];
 $pwd=md5($_POST[p1]);
 $p=$_POST[p1];
 mysql_query("update tb_user set pwd='$pwd' where name='".$nc."'",$conn);
?>
<body>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>>�������� &gt;&gt; ���Ĳ����ɹ�����������</td>
            </tr>
            <tr> 
                <td>�û����� <?php echo $nc;?>
                </td>
            </tr>
            <tr> 
                <td>
                	�����룺<?php echo $p;?>
                </td>
            </tr>
            <tr> 
            <tr> 
                <td>
                	���ס���������벢ʹ��������<a href="../login.php" target="_parent">��¼</a>��
                </td>
            </tr>
        </table>
    </div>
</body>
</html>