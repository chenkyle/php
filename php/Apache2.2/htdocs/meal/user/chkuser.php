<?php
include("../conn/conn.php");
$username=$_POST[usernamel];
$userpwd=md5($_POST[userpwd]);

     $sql=mysql_query("select * from tb_user where name='".$username."'and role='买家'",$conn);
     $info=mysql_fetch_array($sql);
     if($info==false){
          echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";
               exit;
			}
      /*if($info[isactive]!="true"){
			   echo "<script language='javascript'>alert('您的账号未激活，请先到邮箱激活用户账号！');window.location='../regsiter_mail.php?uid=".$info[id]."&active=".$info[isactive]."&email=".$info[email]."';</script>";
               exit;
			}
			*/
          if($info[pwd]==$userpwd)
            {  
			   session_start();
	           $_SESSION[username]=$info[name];//注册SESSION全局变量
//	           $_SESSION[user_id]=$info[id];
			  $_SESSION['producelist']=null; //session_register("producelist");//在全域变量中增加一个变量到目前的 Session 之中
			   //$producelist="";
			  $_SESSION['quatity']=null; //session_register("quatity");
			   // $quatity="";
			    
             header("location:../index.php");//送出 HTTP 协议的标头到浏览器
             
            //echo "<script>alert('登陆成功!');window.location.href='../index.php';</script>";
              exit;
            }
          else {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
             exit;
           }

 }
  
   //echo "<script>alert('欢迎您！');location.href='../index.php'</script>";
   //echo "<script>alert('登陆成功!');window.location.href='../index.php';</script>";
    
?>
<?php 
/*

include("../conn/conn.php");
$username=$_POST[usernamel];
$userpwd=md5($_POST[userpwd]);
class chkinput{
   var $name;
   var $pwd;
   function chkinput($x,$y){
     $this->name=$x;
     $this->pwd=$y;
    }
   function checkinput(){
     include("../conn/conn.php");
     $sql=mysql_query("select * from tb_user where name='".$this->name."'",$conn);
     $info=mysql_fetch_array($sql);
     if($info==false){
          echo "<script language='javascript'>alert('不存在此用户！');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('该用户已经被冻结！');history.back();</script>";
               exit;
			}
      if($info[isactive]!="true"){
			   echo "<script language='javascript'>alert('您的账号未激活，请先到邮箱激活用户账号！');window.location='../regsiter_mail.php?uid=".$info[id]."&active=".$info[isactive]."&email=".$info[email]."';</script>";
               exit;
			}
			
          if($info[pwd]==$this->pwd)
            {  
			   session_start();
	           $_SESSION[username]=$info[name];//注册SESSION全局变量
//	           $_SESSION[user_id]=$info[id];
			   session_register("producelist");//在全域变量中增加一个变量到目前的 Session 之中
			   $producelist="";
			   session_register("quatity");
			    $quatity="";
              header("location:../index.php");//送出 HTTP 协议的标头到浏览器
              
               exit;
            }
          else {
             echo "<script language='javascript'>alert('密码输入错误！');history.back();</script>";
             exit;
           }
      }    
   }
 }
    $obj=new chkinput(trim($username),trim($userpwd));
    $obj->checkinput();
   //echo "<script>alert('欢迎您！');location.href='../index.php'</script>";
   //echo "<script>alert('登陆成功!');window.location.href='../index.php';</script>";
    


 */

?>