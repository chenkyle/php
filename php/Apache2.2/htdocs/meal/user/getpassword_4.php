<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>博唯思订餐系统</title>
<meta name="description" content="博唯思订餐系统." />
<meta name="keywords" content="博唯思,博唯思订餐系统" />
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
                <td>>忘记密码 &gt;&gt; 第四步：成功设置新密码</td>
            </tr>
            <tr> 
                <td>用户名： <?php echo $nc;?>
                </td>
            </tr>
            <tr> 
                <td>
                	新密码：<?php echo $p;?>
                </td>
            </tr>
            <tr> 
            <tr> 
                <td>
                	请记住您的新密码并使用新密码<a href="../login.php" target="_parent">登录</a>！
                </td>
            </tr>
        </table>
    </div>
</body>
</html>