<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>��Ʒ����</title>
<link rel="stylesheet" type="text/css" href="css/forms.css">
</head>
<?php
  include("conn/conn.php");
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
            <td colspan="2"><div class="main-title">��ϲ<?php echo $_SESSION[username];?>�����ѳɹ����ύ�˴˶���!��ϸ��Ϣ����:</div></td>
        </tr>
        <tr>
            <td><img src="images/member_1.gif">�����ţ�<?php echo $dingdanhao;?></td>
            <td>
            </td>
        </tr>
    </table>
    </div>
    <div class="main-menu">
    <table>
        <tr>
          <td colspan="5"><div class="main-title">�˵��б�(����)��</div></td>
        </tr>
        <tr class="main-tit">
            <td>�˵�����</td>
            <td>�г���</td>
            <td>��Ա��</td>
            <td>����</td>
            <td>С��</td>
        </tr>
        <?php
	  $total=0;
	  for($i=0;$i<count($arraysp)-1;$i++){
		 if($arraysp[$i]!=""){
	     $sql1=mysql_query("select * from tb_shangpin where id='".$arraysp[$i]."'",$conn);
	     $info1=mysql_fetch_array($sql1);
		 $total=$total+=$arraysl[$i]*$info1[huiyuanjia];
	  ?>
        <tr>
            <td><?php echo $info1[mingcheng];?></td>
            <td><?php echo $info1[shichangjia];?></td>
            <td><?php echo $info1[huiyuanjia];?></td>
            <td><?php echo $arraysl[$i];?></td>
            <td><?php echo $arraysl[$i]*$info1[huiyuanjia];?></td>
         </tr>
         <?php
	   }
	   }
	 ?>
         <tr>
            <td colspan="5"><font class="red">�ܼƷ���: ��<?php echo $total;?>Ԫ</font></td>
         </tr>
    </table>
    </div>
    <div class="main-infor">
    <table>
        <tr>
            <td class="main-tit">�µ��ˣ�</td>
            <td colspan="3"><?php echo $_SESSION[username];?></td>
        </tr>
        <tr>
            <td class="main-tit">�ջ��ˣ�</td>
            <td colspan="3"><?php echo $info[shouhuoren];?></td>
        </tr>
        <tr>
            <td class="main-tit">�ջ��˵�ַ��</td>
            <td colspan="3"><?php echo $info[dizhi];?></td>
        </tr>
        <tr> 
            <td class="main-tit">��&nbsp;&nbsp;����</td>
            <td colspan="3"><?php echo $info[tel];?></td>
        </tr>
        <tr>
            <td class="main-tit">E-mail:</td>
            <td><?php echo $info[email];?></td>
            <td class="main-tit">֧����ʽ��</td>
            <td><?php echo $info[zfff];?></td>
        </tr>
        <tr>
            <td  colspan="4"><font class="red">�����ڹ涨ʱ���ڰ�����֧����ʽ���л��,���ʱע�����Ķ�����!�����뼰ʱ֪ͨ����</font></td>
        </tr>
        <tr>
            <td colspan="2">
            </td>
            <td class="main-tit">����ʱ�䣺</td>
            <td><?php echo $info[time];?></td>
        </tr>
    </table>
    <?php
$_SESSION[producelist]="";
$_SESSION[quatity]=""; 
?>
    </div>
</div>
</body>
</html>
