<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- ע��ģ�鿪ʼ --><!-- ע��ģ����� -->
    <!-- ���忪ʼ -->
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<div class="list-left">
        	<?php include("left.php");?>
        </div>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
   		<?php
   			$sql_show=mysql_query("select * from tb_aboutus order by id desc limit 0,1",$conn); 
			$info_show=mysql_fetch_array($sql_show);
		 ?>
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - <a href="about.php?mod=about">��������</a></div>
            <!-- �����б�BANNER��ʼ --> 
            <div class="txt-banner"><img src="images/a-banner.png" /></div>
            <!-- �����б�BANNER���� -->
            <!-- ������ϸ�鿴��ʼ -->
            <div class="show-main-box">
                <div class="nwes-view-tit">��������</div>
                <div class="nwes-view-lmname margin-top-20">
                </div>
            	<p>���ݲ�Խ��Ϣ�Ƽ����޹�˾������2009�꣬��һ�Ҽ�����ҵ�͵�������Ϣ�Ƽ���˾��Ŀǰ��˾רע��������������ϵͳ���о��뿪�����������о�������ӵ������֪ʶ��Ȩ���¼����ܹ���Ʒ��</p>
<p>��˾��<span class="color-blue">&ldquo;����ƽ����������ҵ&rdquo;</span>Ϊ���ļ�ֵ����<span class="color-blue">&ldquo;�����ڳ���׷��׿Խ&rdquo;</span>Ϊ�ŶӾ�����<span class="color-blue">&ldquo;��ʱ�����š�ʡǮ&rdquo;</span>Ϊ��Ӫ�����<span class="color-blue">&ldquo;���Ի���רҵ������׼��&rdquo;</span>Ϊְҵ��չĿ�ꡣ</p>
<p>���ڽ׶����ǵ���Ҫҵ��<span class="color-blue">��վ���衢�Ӿ���ơ�ϵͳ������</span></p>
<p>�����ŵ:</p>
<p>����ע����ÿһ�����������ϸ�ڣ���������ҵ�����Ķ��٣������ͻ����������������׷���Ŀ�ꡣ�������Ǹ��ˡ���ҵ����λ����ҵ�ڸ���ͬ�ˣ�ֻҪ������Ҫ�����ǽ�ȫ���Ը�Ϊ���ṩ�����ĵķ���</p>
<p><br />
&nbsp;</p>
<p class="color-blue">���ڲ�Ψ˼��bowos���Ŷӣ�</p>
<p>��Ψ˼��bowos���Ŷӳ�����2006�꣬ǰ��Ϊ����Ŷӣ���һ֧ӵ�м��顢���롢̤ʵ�Ĵ�ҵ�Ŷӡ�</p>
<p>Bowos,������:��Ψ˼��Ԣ�⣺<span class="color-blue">����Ψ�����ǻ�</span>,���ǲ�Ψ˼�Ŷ�������һ��������</p>
<p>����&mdash;&mdash;������� һ�����ꣻΨ��&mdash;&mdash;�۹��� �����������ǻ�&mdash;&mdash;�����ڳ� ��־��ȡ��</p>            </div>
            <!-- ������ϸ�鿴���� -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
   <?php include("bottom.php");?>