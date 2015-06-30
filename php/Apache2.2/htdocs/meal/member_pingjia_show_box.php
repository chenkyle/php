<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>博唯思订餐系统</title>
<meta name="description" content="博唯思订餐系统." />
<meta name="keywords" content="博唯思,博唯思订餐系统" />
<link rel="stylesheet" type="text/css" href="css/master.css" />
<link rel="stylesheet" type="text/css" href="css/box.css" />
</head>
<body>
    <div class="box">	
        <!-- 会员中心首页订单开始 -->
        	<?php
        	session_start();
        	$pjid=$_GET[m_id];
        	if($_SESSION['username']==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
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
                <li class="member-send-b"> 发布时间：<?php echo $info[time];?></li>
            </div>
        </div>
        <!-- 会员中心首页订单结束 -->
    </div>
</body>
</html>