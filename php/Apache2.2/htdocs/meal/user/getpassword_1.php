<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>博唯思订餐系统</title>
<meta name="description" content="博唯思订餐系统." />
<meta name="keywords" content="博唯思,博唯思订餐系统" />
<link rel="stylesheet" type="text/css" href="../css/master.css" />
<link rel="stylesheet" type="text/css" href="../css/box.css" />
<script language="javascript">
function chkinput(form){if(form.nc.value==""){alert("请输入您的用户名!");form.nc.select();return(false);}return(true);}
</script>
</head>
<body>
<br></br>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>忘记密码 &gt;&gt; 第一步：输入用户名</td>
            </tr>
            <form name="form1" method="post" action="getpassword_2.php" onSubmit="return chkinput(this)">
            <tr> 
                <td>
                    用户名：
                    <input name="nc" type="text" id="nc" class="inputcss"/>
                </td>
            </tr>
            <tr> 
                <td>
                    <input name="Next" type="submit" id="Next" class="getpassword-submit" value="下一步" />
                    <input name="Cancel" type="reset" id="Cancel" class="getpassword-button"  value=" 重置 " />
                </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>