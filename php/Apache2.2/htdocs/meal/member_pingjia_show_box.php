<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>��Ψ˼����ϵͳ</title>
<meta name="description" content="��Ψ˼����ϵͳ." />
<meta name="keywords" content="��Ψ˼,��Ψ˼����ϵͳ" />
<link rel="stylesheet" type="text/css" href="css/master.css" />
<link rel="stylesheet" type="text/css" href="css/box.css" />
</head>
<body>
    <div class="box">	
        <!-- ��Ա������ҳ������ʼ -->
        	<?php
        	session_start();
        	$pjid=$_GET[m_id];
        	if($_SESSION['username']==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
        	include("conn/conn.php");
        	
        	$sql=mysql_query("select * from tb_pingjia where id='".$pjid."' order by time desc",$conn);
			   //$sql=mysql_query("select * from tb_message where id='".$_GET[m_id]."'",$conn);
			   $info=mysql_fetch_array($sql);
			  ?>
        <div class="member-right-sc">
            <div class="member-right-main member-send">
                <li class="member-send-t"><?php echo $info[title];?></li>
                <li class="member-send-n">
                <?php echo $info[content];?>
                </li>
                <li class="member-send-b"> ����ʱ�䣺<?php echo $info[time];?></li>
            </div>
        </div>
        <!-- ��Ա������ҳ�������� -->
    </div>
</body>
</html>