<?php
class chkinput{
	var $name;
	var $pwd;

	function chkinput($x,$y)
	{
		$this->name=$x;
		$this->pwd=$y;
	}

	function checkinput()
	{
		include("conn/conn.php");
		$sql=mysql_query("select * from tb_admin where name='".$this->name."'",$conn);
		$info=mysql_fetch_array($sql);
		if($info==false)
		{
			echo "<script language='javascript'>alert('不存在此管理员！');history.back();</script>";
			exit;
		}
		else
		{
			if($info[pwd]==$this->pwd){
				session_start();
				$_SESSION[admin]=$info[name];//注册SESSION全局变量
				header("location:admin_main.php");
			}
			else
			{
				echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
				exit;
			}

		}
	}
}


$obj=new chkinput(trim($_POST[name]),md5(trim($_POST[pwd])));
$obj->checkinput();

?>