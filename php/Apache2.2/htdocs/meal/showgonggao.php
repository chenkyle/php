<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- ע��ģ�鿪ʼ -->
    <div class="banner">
        <?php include("zhuce.php");?>
	</div>
    <!-- ע��ģ����� -->
    <!-- ���忪ʼ -->
    <div class="main">
    	<!-- ��߿�ʼ -->
    	<div class="list-left">
        	<?php include("left.php");?>
        </div>
        <!-- ��߽��� -->
   		<!-- �ұ߿�ʼ -->
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">ϵͳ��ҳ</a> - ϵͳ����</div>
            <!-- �����б�BANNER��ʼ --> 
            <div class="txt-banner"><img src="images/banner_1.png" /></div>
            <!-- �����б�BANNER���� -->
            <div class="list-menu">
                <li class="sort-menu-active"><a href="#">ϵͳ����</a></li>
            </div>
            <!-- �����б�ʼ -->
            <!-- ���º��ӿ�ʼ -->
            <?php 
            $sql_showgg=mysql_query("select * from tb_gonggao order by time desc",$conn);
			$info_showgg=mysql_fetch_array($sql_showgg);
			if($info_showgg==false)
			{
				echo "��վ���޸�����Ϣ!";
			}
			else
			{
				do
				{
			?>
            <div>
                <li class="txt_title"><span class="txt_title"><a href="showgg.php?id=<?php echo $info_showgg[id];?>"><?php echo $info_showgg[title];?></a></span></li>
                <li class="txt_con"><a href="showgg.php?id=<?php echo $info_showgg[id];?>">
                <?php echo substr($info_showgg[content],0,300);
				if(strlen($info_showgg[content])>300){echo "...";} 
				?></a>
                </li>
                <li class="txt_other"><span class"txt_time">������<?php echo $info_showgg[time];?></span>
                <span class="txt_hit">�����<font color="red">24</font></span><a href="showgg.php?id=<?php echo $info_showgg[id];?>">[����ȫ��]</a></li>
            </div>
            <?php }while($info_showgg=mysql_fetch_array($sql_showgg));}?>
            <!-- ���º��ӽ��� -->
            
            <!-- �����б���� -->
            <!-- ҳ�뿪ʼ -->
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
            <!-- ҳ����� -->
		</div>
        <!-- �ұ߽��� -->
        <div class="clearfix"></div>
    </div>
    <!-- ������� -->
   <?php include("bottom.php");?>