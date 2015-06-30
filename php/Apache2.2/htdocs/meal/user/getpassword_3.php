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
<script language="javascript">
function chkinput(form){
	if(form.p1.value==""){alert('请输入新密码!');form.p1.select();return(false);}
	if(form.p2.value==""){alert("请输入确认密码!");form.p2.select();return(false);}	
	if(form.p1.value.length<6){alert("密码长度小于6!");form.p1.select();return(false);}	
	if(form.p1.value!=form.p2.value){alert("密码与确认密码不同!");form.p1.select();return(false);}
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
   echo "<script>alert('提示答案输入错误!');history.back();</script>";
  exit;
 }
 else
 {
?>
<body>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>忘记密码 &gt;&gt; 第三步：设置新密码</td>
            </tr>
            <form name="form1" method="post" action="getpassword_4.php" onSubmit="return chkinput(this)">
            <tr> 
                <td>
                	输入密码：<input name="p1" type="password" id="p1" class="inputcss" >
                </td>
            </tr>
            <tr> 
                <td>
                	确认密码：<input name="p2" type="password" id="p2" class="inputcss" >
                </td>
            </tr>
            <tr> 
                <td>
                	<input type="hidden" name="nc" value="<?php echo $nc;?>">
                    <input name="PrevStep" type="button" id="PrevStep" value="上一步" class="getpassword-submit" onClick="history.go(-1)">
                    <input name="Next" type="submit" id="Next" class="getpassword-submit" value="下一步">
                    <input name="Cancel" type="reset" id="Cancel" class="getpassword-button" value=" 重置 ">
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