<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>��Ψ˼����ϵͳ</title>
<meta name="description" content="��Ψ˼����ϵͳ." />
<meta name="keywords" content="��Ψ˼,��Ψ˼����ϵͳ" />
<link rel="stylesheet" type="text/css" href="../css/master.css" />
<link rel="stylesheet" type="text/css" href="../css/box.css" />
<script language="javascript">
function chkinput(form){if(form.nc.value==""){alert("�����������û���!");form.nc.select();return(false);}return(true);}
</script>
</head>
<body>
<br></br>
    <div class="box">
        <table class="getpassword">
            <tr class="getpassword-title"> 
                <td>�������� &gt;&gt; ��һ���������û���</td>
            </tr>
            <form name="form1" method="post" action="getpassword_2.php" onSubmit="return chkinput(this)">
            <tr> 
                <td>
                    �û�����
                    <input name="nc" type="text" id="nc" class="inputcss"/>
                </td>
            </tr>
            <tr> 
                <td>
                    <input name="Next" type="submit" id="Next" class="getpassword-submit" value="��һ��" />
                    <input name="Cancel" type="reset" id="Cancel" class="getpassword-button"  value=" ���� " />
                </td>
            </tr>
            </form>
        </table>
    </div>
</body>
</html>