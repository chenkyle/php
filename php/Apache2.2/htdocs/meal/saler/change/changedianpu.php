<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���ĵ�����Ϣ</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//�������߱༭��
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php 
  include("../conn/conn.php");
  	
  session_start();
	$salename = $_SESSION["salername"];
	
	$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='����'",$conn);
	$info=mysql_fetch_array($sql);
	$salerid=$info[id];

  $sql1=mysql_query("select * from tb_dianpu where id=".$salerid."",$conn);
  $info1=mysql_fetch_array($sql1);
?>
<body>
<div class="main">
<script language="javascript">
function chkinput(form){
if(form.companyname.value==""){alert("�������������!");form.companyname.select();return(false);}
if(form.hostname.value==""){alert("�����븺��������!");form.hostname.select();return(false);}
if(form.phone.value==""){alert("������绰!");form.phone.select();return(false);}
if(form.sendprice.value==""){alert("���������ͷ���!");form.sendprice.select();return(false);}
if(form.prices.value==""){alert("���������ͼ۸�!");form.prices.select();return(false);}
return(true);}
</script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="../save/savechangedianpu.php?sid=<?php echo $salerid;?>" onSubmit="return chkinput(this)">

<table>
  <tr>
    <td colspan="2"><div class="main-title">���ĵ�����Ϣ</div></td>
  </tr>
          <tr>
            <td>��������</td>
            <td><div align="left">
                <input type="text" name="companyname" size="20" class="inputcss" value="<?php echo $info1[companyname];?>">
            </div></td>
          </tr>
       
          <tr>
            <td>����������</td>
            <td><div align="left">
                <input type="text" name="hostname" size="10" class="inputcss" value="<?php echo $info1[hostname];?>">
            </div></td>
          </tr>
          
          <tr>
            <td>�绰</td>
            <td><div align="left">
                <input type="text" name="phone" class="inputcss" size="20" value="<?php echo $info1[phone];?>">
            </div></td>
          </tr>
          <tr>
            <td>���ͷ���</td>
            <td><div align="left">
                <input type="text" name="sendprice" class="inputcss" size="20" value="<?php echo $info1[sendprice];?>">Ԫ
            </div></td>
          </tr>
          
             <tr>
            <td>���ͼ۸�</td>
            <td><div align="left">
                <input type="text" name="prices" class="inputcss" size="20" value="<?php echo $info1[prices];?>">Ԫ
            </div></td>
          </tr>
          
          <tr>
            <td>���</td>
            <td><div align="left">
           <textarea name="introduction" rows="8" cols="70"> <?php echo $info1[introduction];?> </textarea>
          </div></td>
          </tr>
          
          <tr>
            <td colspan="2">
              <input type="submit" class="buttoncss" value="����">
              &nbsp;&nbsp;
                <input type="reset" value="����" class="buttoncss">
            </td>
          </tr>
        
</table></form>
</div>
</body>
</html>
