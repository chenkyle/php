<?php
include("../conn/conn.php");
$username=$_POST[usernamel];
$userpwd=md5($_POST[userpwd]);

     $sql=mysql_query("select * from tb_user where name='".$username."'and role='���'",$conn);
     $info=mysql_fetch_array($sql);
     if($info==false){
          echo "<script language='javascript'>alert('�����ڴ��û���');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('���û��Ѿ������ᣡ');history.back();</script>";
               exit;
			}
      /*if($info[isactive]!="true"){
			   echo "<script language='javascript'>alert('�����˺�δ������ȵ����伤���û��˺ţ�');window.location='../regsiter_mail.php?uid=".$info[id]."&active=".$info[isactive]."&email=".$info[email]."';</script>";
               exit;
			}
			*/
          if($info[pwd]==$userpwd)
            {  
			   session_start();
	           $_SESSION[username]=$info[name];//ע��SESSIONȫ�ֱ���
//	           $_SESSION[user_id]=$info[id];
			  $_SESSION['producelist']=null; //session_register("producelist");//��ȫ�����������һ��������Ŀǰ�� Session ֮��
			   //$producelist="";
			  $_SESSION['quatity']=null; //session_register("quatity");
			   // $quatity="";
			    
             header("location:../index.php");//�ͳ� HTTP Э��ı�ͷ�������
             
            //echo "<script>alert('��½�ɹ�!');window.location.href='../index.php';</script>";
              exit;
            }
          else {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";
             exit;
           }

 }
  
   //echo "<script>alert('��ӭ����');location.href='../index.php'</script>";
   //echo "<script>alert('��½�ɹ�!');window.location.href='../index.php';</script>";
    
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
          echo "<script language='javascript'>alert('�����ڴ��û���');history.back();</script>";
          exit;
       }
      else{
	      if($info[dongjie]==1){
			   echo "<script language='javascript'>alert('���û��Ѿ������ᣡ');history.back();</script>";
               exit;
			}
      if($info[isactive]!="true"){
			   echo "<script language='javascript'>alert('�����˺�δ������ȵ����伤���û��˺ţ�');window.location='../regsiter_mail.php?uid=".$info[id]."&active=".$info[isactive]."&email=".$info[email]."';</script>";
               exit;
			}
			
          if($info[pwd]==$this->pwd)
            {  
			   session_start();
	           $_SESSION[username]=$info[name];//ע��SESSIONȫ�ֱ���
//	           $_SESSION[user_id]=$info[id];
			   session_register("producelist");//��ȫ�����������һ��������Ŀǰ�� Session ֮��
			   $producelist="";
			   session_register("quatity");
			    $quatity="";
              header("location:../index.php");//�ͳ� HTTP Э��ı�ͷ�������
              
               exit;
            }
          else {
             echo "<script language='javascript'>alert('�����������');history.back();</script>";
             exit;
           }
      }    
   }
 }
    $obj=new chkinput(trim($username),trim($userpwd));
    $obj->checkinput();
   //echo "<script>alert('��ӭ����');location.href='../index.php'</script>";
   //echo "<script>alert('��½�ɹ�!');window.location.href='../index.php';</script>";
    


 */

?>