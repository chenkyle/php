<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����Ͷ��	</title>
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

?>
<body>
<div class="main">
<script language="javascript">
function chkinput(form){
if(form.content.value==""){alert("������Ͷ������!");form.content.select();return(false);}

return(true);}
</script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="../save/savetousu.php?sid=<?php echo $salerid;?>" onSubmit="return chkinput(this)">

<table>
  <tr>
    <td colspan="2"><div class="main-title">Ͷ������</div></td>
  </tr>
         
    <tr>
            <td>Ͷ������</td>
            <td><div align="left">
           <textarea name="content" rows="8" cols="70">  </textarea>
          </div></td>
          </tr>
          
          <tr>
            <td colspan="2">
              <input type="submit" class="buttoncss" value="�ύ">
              &nbsp;&nbsp;
                <input type="reset" value="����" class="buttoncss">
            </td>
          </tr>
        
</table></form>
</div>
</body>
</html>


