<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������ѯ</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
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
<table>
        <tr>
          <td><div class="main-title">������ѯ</div></td>
        </tr>
        <tr>
          <td><table>
            <tr>
              <td>
			  <table>
<script language="javascript">
function chkinput3(form){if((form.username.value=="")&&(form.ddh.value=="")){alert("�������¶����˻򶩵���");form.username.select();return(false);}return(true);  }
</script>
                <form name="form3" method="post" action="../find/finddd.php" onSubmit="return chkinput3( this)">
				<tr>
                  <td>�µ�������:<input type="text" name="username" class="inputcss" size="25" >
                    ������:<input type="text" name="ddh" size="25" class="inputcss" ></td>
                </tr>
                <tr>
                  <td>
					    <input type="hidden" value="show_find" name="show_find">
                        <input name="button" type="submit" class="buttoncss" id="button" value="�� ��">
                  </td>
                </tr>
			    </form>
              </table></td>
            </tr>
          </table></td>
        </tr>
</table>
      <table>
        <tr>
          <td>&nbsp;</td>
        </tr>
      </table>
	  <?php
	    if($_POST[show_find]!=""){
	      $username=trim($_POST[username]);
		  $ddh=trim($_POST[ddh]);
		  if($username==""){
		       $sql=mysql_query("select * from tb_dingdan where dingdanhao='".$ddh."' and salerid='".$salerid."'",$conn);
		   }
		  elseif($ddh==""){
		      $sql=mysql_query("select * from tb_dingdan where xiadanren='".$username."' and salerid='".$salerid."'",$conn);
		   }
		  else{
		      $sql=mysql_query("select * from tb_dingdan where xiadanren='".$username."' and salerid='".$salerid."' and dingdanhao='".$ddh."'",$conn);
		  }
		  $info=mysql_fetch_array($sql);
		  if($info==false){
		      echo "<div algin='center'>�Բ���,û�в��ҵ��ö���!</div>";    
		   }
		   else{
	  ?>
	  <table>
        <tr>
          <td colspan="6"><div class="main-title">��ѯ���</div></td>
        </tr>
            <tr class="main-tit">
              <td>������</td>
              <td>�µ��û�</td>
              <td>������</td>
              <td>����ܼ�</td>
              <td>���ʽ</td>
              <td>����״̬</td>
            </tr>
			<?php
			  do{
			?>
            <tr>
              <td><?php echo $info[dingdanhao];?></td>
              <td ><?php echo $info[xiadanren];?></td>
              <td><?php echo $info[shouhuoren];?></td>
              <td ><?php echo $info[total];?></td>
              <td><?php echo $info[zfff];?></td>
              <td><?php echo $info[zt];?></td>
            </tr>
			<?php
			   }while($info=mysql_fetch_array($sql));
			?>
      </table>
	    <?php
		   }
		  }
		?>
		</div>
</body>
</html>
