<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>更改店铺信息</title>
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

  $sql1=mysql_query("select * from tb_dianpu where id=".$salerid."",$conn);
  $info1=mysql_fetch_array($sql1);
?>
<body>
<div class="main">
<script language="javascript">
function chkinput(form){
if(form.companyname.value==""){alert("请输入店铺名称!");form.companyname.select();return(false);}
if(form.hostname.value==""){alert("请输入负责人姓名!");form.hostname.select();return(false);}
if(form.phone.value==""){alert("请输入电话!");form.phone.select();return(false);}
if(form.sendprice.value==""){alert("请输入外送费用!");form.sendprice.select();return(false);}
if(form.prices.value==""){alert("请输入起送价格!");form.prices.select();return(false);}
return(true);}
</script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="../save/savechangedianpu.php?sid=<?php echo $salerid;?>" onSubmit="return chkinput(this)">

<table>
  <tr>
    <td colspan="2"><div class="main-title">更改店铺信息</div></td>
  </tr>
          <tr>
            <td>店铺名称</td>
            <td><div align="left">
                <input type="text" name="companyname" size="20" class="inputcss" value="<?php echo $info1[companyname];?>">
            </div></td>
          </tr>
       
          <tr>
            <td>负责人姓名</td>
            <td><div align="left">
                <input type="text" name="hostname" size="10" class="inputcss" value="<?php echo $info1[hostname];?>">
            </div></td>
          </tr>
          
          <tr>
            <td>电话</td>
            <td><div align="left">
                <input type="text" name="phone" class="inputcss" size="20" value="<?php echo $info1[phone];?>">
            </div></td>
          </tr>
          <tr>
            <td>外送费用</td>
            <td><div align="left">
                <input type="text" name="sendprice" class="inputcss" size="20" value="<?php echo $info1[sendprice];?>">元
            </div></td>
          </tr>
          
             <tr>
            <td>起送价格</td>
            <td><div align="left">
                <input type="text" name="prices" class="inputcss" size="20" value="<?php echo $info1[prices];?>">元
            </div></td>
          </tr>
          
          <tr>
            <td>简介</td>
            <td><div align="left">
           <textarea name="introduction" rows="8" cols="70"> <?php echo $info1[introduction];?> </textarea>
          </div></td>
          </tr>
          
          <tr>
            <td colspan="2">
              <input type="submit" class="buttoncss" value="更改">
              &nbsp;&nbsp;
                <input type="reset" value="重置" class="buttoncss">
            </td>
          </tr>
        
</table></form>
</div>
</body>
</html>
