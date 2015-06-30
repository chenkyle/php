<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>用户信息管理</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
</style>
</head>
<?php
	include("../conn/conn.php");
	$id=$_GET[id];
	$sql=mysql_query("select * from tb_user where id=".$id."",$conn);
	$info=mysql_fetch_array($sql);
?>
<body>
<div class="main">
<table>
  <tr>
    <td colspan="4"><div class="main-title">用户信息查看</div></td>
  </tr>
      <tr>
        <td>用户昵称：</td>
        <td><div align="left"><?php echo $info[name];?></div></td>
        <td>用户状态：</td>
        <td><div align="left"><?php
	 if($info[dongjie]==0)
	  {
	    echo "非冻结状态";
	  }
	  else
	  { 
	   echo "冻结状态"; 
	  }
		?></div></td>
      </tr>
      <tr>
        <td>真实姓名</td>
        <td colspan="3"><div align="left"><?php echo $info[truename];?></div></td>
      </tr>
	  <tr>
        <td>E-mail：</td>
        <td colspan="3"><div align="left"><?php echo $info[email];?></div></td>
      </tr>
	  <tr>
        <td>联系电话：</td>
        <td colspan="3"><div align="left"><?php echo $info[tel];?></div></td>
      </tr>
	  <tr>
        <td >QQ号码：</td>
        <td colspan="3" ><div align="left"><?php echo $info[qq];?></div></td>
      </tr>
	  <tr>
        <td>注册时间：</td>
        <td colspan="3" ><div align="left"><?php echo $info[regtime];?></div></td>
      </tr>
	  <tr>
        <td >密码提示：</td>
        <td colspan="3" ><div align="left"><?php echo $info[tishi];?></div></td>
      </tr>
	  <tr>
        <td >密码提示答案：</td>
        <td colspan="3" ><div align="left"><?php echo $info[huida];?></div></td>
      </tr>
  <tr>
    <td colspan="4"><a href="../dongjieuser.php?id=<?php echo $id;?>">
	<?php
	 $sql=mysql_query("select * from tb_user where id=".$id."",$conn);
	 $info=mysql_fetch_array($sql);
	 if($info[dongjie]==0)
	  {
	    echo "冻结该用户";
	  }
	  else
	  {
	    echo "解除冻结";
	  }
	?></a>&nbsp;&nbsp;
  </tr>
</table>
</div>
</body>
</html>
