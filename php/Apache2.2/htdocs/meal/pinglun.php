<?php
include("conn/conn.php");
session_start();
$username = $_SESSION["username"];

$sql=mysql_query( "select * from tb_user where name='".$username."'and role='���'",$conn);
$info=mysql_fetch_array($sql);
$uid=$info[id];


?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���۲�Ʒ</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<?php
  
  $dingdanhao=$_GET[dd];
  $sql=mysql_query("select * from tb_dingdan where dingdanhao='".$dingdanhao."'",$conn);
  $info=mysql_fetch_array($sql);
  $spc=$info[spc];
  $slc=$info[slc];
  $arraysp=explode("@",$spc);
  $arraysl=explode("@",$slc);
?>
<body>
<div class="main">
	<div class="main-number">
    <table>
        <tr>
            <td colspan="2"><div class="main-title"><?php echo $_SESSION[username];?>�����ã���͹��ύ�������ۣ�</div></td>
        </tr>
    </table>
    </div>
   
    <br>
 <form name="form1" enctype="multipart/form-data" method="post" action="" onSubmit="return chkinput(this)">
	<table> 
	 <tr>
        <td>ѡ���Ʒ</td>
        <td><div align="left">
			<?php
			 ?>
			 <select name="spid" class="inputcss">	
           
			<?php
	  for($i=0;$i<count($arraysp)-1;$i++)
	  {
		 if($arraysp[$i]!="")
		 {
	     $sql=mysql_query("select * from tb_shangpin where id='".$arraysp[$i]."'",$conn);
	     $info=mysql_fetch_array($sql);
		
			if($info==false)
			{
			  echo "�޲�Ʒ��Ϣ!";
			}
			else
			{
		
			do
			{
			?>
              <option value=<?php echo $info[id];?>><?php echo $info[mingcheng];?></option>
			<?php
			}
			while($info=mysql_fetch_array($sql));
			?>  
           
            <?php
		     }
		 }
	  }
		    ?>
		     </select>
        </div></td>
      </tr>
      
	 
	  <tr>
        <td>����</td>
        <td><div align="left"><input type="text" name="title" size="25" class="inputcss"></div></td>
      </tr>
 
      <tr>
        <td>����</div></td>
        <td><div align="left"> <textarea name="content" rows="8" cols="70"> <?php echo $info1[introduction];?> </textarea>
        </div></td>
      </tr>
 
      <tr>
        <td colspan="2"><div align="center"><input name="submit" type="submit" class="buttoncss" id="submit" value="�ύ">
        &nbsp;&nbsp;<input type="reset" value="����" class="buttoncss"></div></td>
      </tr>
  
   </<table>
	  </form>
	  
    </div>
</div>

<?php

$spid = $_POST[spid];
$title=$_POST[title];
$content=$_POST[content];
$time=date("Y-m-j");

$result =mysql_query("insert into tb_pingjia (userid,spid,title,content,time) values ('$uid','$spid','$title','$content','$time')",$conn);
// mysql_query("update tb_dianpu set companyname='$companyname',hostname='$hostname',phone='$phone',sendprice='$sendprice',prices='$prices',introduction='$introduction'where id=".$ssid."",$conn);

if($result==true)
{	
	echo "<script>alert('������ӳɹ�!');window.parent.location.href='member_shop_history.php';</script>";
}

?>
</body>
</html>
