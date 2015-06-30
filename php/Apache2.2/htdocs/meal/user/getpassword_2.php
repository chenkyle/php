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
function chkinput(form){if(form.da.value==""){alert('请输入密码提示答案!');form.da.select();return(false);}return(true);}
 </script>
</head>
<?php
 include("../conn/conn.php");
?>
<body>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>忘记密码 &gt;&gt; 第二步：回答问题</td>
            </tr>
            <form name="form2" method="post" action="getpassword_3.php" onSubmit="return chkinput(this)">
            <tr> 
                <td>
                    密码提示问题：
<?php
	  $nc=$_POST[nc];
	  $sql=mysql_query("select * from tb_user where name='".$nc."'",$conn);
	  $info=mysql_fetch_array($sql);
	  if($info==false)
	   {
	     echo "<script>alert('无此用户!');history.back();</script>";
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
                    你的答案：<input name="da" type="text" class="inputcss">
                 <input type="hidden" name="nc" value="<?php echo $nc;?>">
                </td>
            </tr>
            <tr> 
                <td>
                    你的邮箱：<input name="Mail" type="text" class="inputcss">
                </td>
            </tr>
            <tr> 
                <td>
                    <input name="PrevStep" type="button" id="PrevStep" value="上一步" class="getpassword-submit" onClick="history.go(-1)">
                    <input name="Next" type="submit" id="Next" class="getpassword-submit" value="下一步">
                    <input name="Cancel" type="reset" id="Cancel" class="getpassword-button" value=" 重置 ">
                </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>