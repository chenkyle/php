<?php
session_start();
include("conn/conn.php");
include("top.php");

$username = $_SESSION["username"];

$sql=mysql_query( "select * from tb_user where name='".$username."'and role='���'",$conn);
$info=mysql_fetch_array($sql);
$uid=$info[id];


if($_SESSION[username]==""){
    echo "<script>alert('����û�е�¼!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<link rel="stylesheet" type="text/css" href="css/subModal.css" />
	<script type="text/javascript" src="js/common.js"></script>
	<script type="text/javascript" src="js/subModal.js"></script>
<!-- ��ҳע��ģ�鿪ʼ -->
<!-- ��ҳע��ģ����� -->
    <!-- ���忪ʼ -->
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<?php include("member_left.php");?>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="member.php">��Ա����</a> - ���۹���</div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
            <div class="member-right-tit">�鿴����</div>
            <div class="member-right-box">
            	<!-- ��Ա������ҳ������ʼ -->
                <div class="member-right-htitle">
                    <span class="member-right-htitle-active">�ҵ�����</span>
                    
                </div>
                <div class="member-right-sc">
                <form name="form1" method="post" action="user/deletemessages.php">   
                    <table>
                      <tr class="member-right-sc-s">
                        <td class="member-right-sc-b member-right-sc-tit">����</td>
                        <td>��Ʒ </td>
                    
                        <td>����ʱ��</td>
                       
                      </tr>
                      <?php
						$sql_m=mysql_query("select * from tb_pingjia where userid='".$uid."' order by time desc",$conn);
						$info_m=mysql_fetch_array($sql_m);
						$i=0;
						if($info_m==false)
						{
							echo "<td height='25' colspan='5'><li class=no-info>����û�и����ҷ�������!</li></td>";
						}
						else
						{
							do
							{
								if($i%2==0){
					  ?>
                      <tr class="member-right-sc-d">
                        <td class="member-right-sc-b member-right-sc-tit">
                        <a class="submodal-750-450" 
			href="member_pingjia_show_box.php?m_id=<?php echo $info_m[id];?>"><?php echo $info_m[title];?></a>
                        </td>
                        <td><?php 
                        $sql9=mysql_query("select * from tb_shangpin where id='".$info_m[spid]."'",$conn);
	    				 $info9=mysql_fetch_array($sql9);
	     					
	    				 echo $info9[mingcheng]
                        ?></td>
                   		
                        <td><?php echo $info_m[time];?></td>                   
                      </tr>
                      
                      <?php $i++;}else{?>
                      <tr class="member-right-sc-s">
                        <td class="member-right-sc-b member-right-sc-tit">
                        <a class="submodal-750-450" 
			href="member_pingjia_show_box.php?m_id=<?php echo $info_m[id];?>"><?php echo $info_m[title];?></a>
                        </td>             
                      <td><?php 
                        $sql9=mysql_query("select * from tb_shangpin where id='".$info_m[spid]."'",$conn);
	    				 $info9=mysql_fetch_array($sql9);
	     					
	    				 echo $info9[mingcheng]
                        ?></td>
                                           
                        <td><?php echo $info_m[time];?></td>                             
                      </tr>
                      
                      <?php $i++;} }while($info_m=mysql_fetch_array($sql_m));}?>
                    </table>
                    </form>
                      <div class="page-bottom">
                            <span class="page-start"><a href="#" title="��һҳ"></a></span>
                            <span class="page-cur">1</span>
                            <a href="#" class="page-no">2</a>
                            <a href="#" class="page-no">3</a>
                            <a href="#" class="page-no">4</a>
                            <a href="#" class="page-no">5</a>
                            <span class="page-break">...</span>
                            <span class="page-prev"><a href="#" title="��һҳ"></a></span>
                            <li class="page-skip">��9ҳ ����<input class="page-skip-input" type="text" name="jumpto" id="jumpto" size="3" value="1"/>ҳ <input class="page-skip-button" type="submit" class="page-skip-button"  value="" title="ȷ��"></li>
                      </div>
                </div>
                <!-- ��Ա������ҳ�������� -->
            </div>
            <!-- ��Ա�����ұ���ҳ��ʼ -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
     <?php include("bottom.php");?>