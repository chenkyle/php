<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>卖家投诉	</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//引入在线编辑器
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php 
  include("../conn/conn.php");
  	
  session_start();
	$salename = $_SESSION["salername"];
	
	$sql=mysql_query( "select * from tb_user where name='".$salename."'and role='卖家'",$conn);
	$info=mysql_fetch_array($sql);
	$salerid=$info[id];

?>
<body>
<div class="main">
<script language="javascript">
function chkinput(form){
if(form.content.value==""){alert("请输入投诉内容!");form.content.select();return(false);}

return(true);}
</script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="../save/savetousu.php?sid=<?php echo $salerid;?>" onSubmit="return chkinput(this)">

<table>
  <tr>
    <td colspan="2"><div class="main-title">投诉中心</div></td>
  </tr>
         
    <tr>
            <td>投诉内容</td>
            <td><div align="left">
           <textarea name="content" rows="8" cols="70">  </textarea>
          </div></td>
          </tr>
          
          <tr>
            <td colspan="2">
              <input type="submit" class="buttoncss" value="提交">
              &nbsp;&nbsp;
                <input type="reset" value="重置" class="buttoncss">
            </td>
          </tr>
        
</table></form>
</div>
</body>
</html>


