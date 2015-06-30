<?php
session_start();
include("conn/conn.php");
include("top.php");

$username = $_SESSION["username"];

$sql=mysql_query( "select * from tb_user where name='".$username."'and role='买家'",$conn);
$info=mysql_fetch_array($sql);
$uid=$info[id];


if($_SESSION[username]==""){
    echo "<script>alert('您还没有登录!');window.location.href='regsiter.php';</script>";
	exit;
  }
?>
<link rel="stylesheet" type="text/css" href="css/subModal.css" />
	<script type="text/javascript" src="js/common.js"></script>
	<script type="text/javascript" src="js/subModal.js"></script>
<!-- 首页注册模块开始 -->
<!-- 首页注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<?php include("member_left.php");?>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="member.php">会员中心</a> - 评价管理</div>
            <!-- 会员中心右边首页开始 -->
            <div class="member-right-tit">查看评价</div>
            <div class="member-right-box">
            	<!-- 会员中心首页订单开始 -->
                <div class="member-right-htitle">
                    <span class="member-right-htitle-active">我的评价</span>
                    
                </div>
                <div class="member-right-sc">
                <form name="form1" method="post" action="user/deletemessages.php">   
                    <table>
                      <tr class="member-right-sc-s">
                        <td class="member-right-sc-b member-right-sc-tit">标题</td>
                        <td>菜品 </td>
                    
                        <td>发送时间</td>
                       
                      </tr>
                      <?php
						$sql_m=mysql_query("select * from tb_pingjia where userid='".$uid."' order by time desc",$conn);
						$info_m=mysql_fetch_array($sql_m);
						$i=0;
						if($info_m==false)
						{
							echo "<td height='25' colspan='5'><li class=no-info>您还没有给卖家发表评论!</li></td>";
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
                            <span class="page-start"><a href="#" title="上一页"></a></span>
                            <span class="page-cur">1</span>
                            <a href="#" class="page-no">2</a>
                            <a href="#" class="page-no">3</a>
                            <a href="#" class="page-no">4</a>
                            <a href="#" class="page-no">5</a>
                            <span class="page-break">...</span>
                            <span class="page-prev"><a href="#" title="下一页"></a></span>
                            <li class="page-skip">共9页 到第<input class="page-skip-input" type="text" name="jumpto" id="jumpto" size="3" value="1"/>页 <input class="page-skip-button" type="submit" class="page-skip-button"  value="" title="确定"></li>
                      </div>
                </div>
                <!-- 会员中心首页订单结束 -->
            </div>
            <!-- 会员中心右边首页开始 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
     <?php include("bottom.php");?>