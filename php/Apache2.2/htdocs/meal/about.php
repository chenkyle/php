<?php
include("conn/conn.php");
include("top.php");
?>
    <!-- 注册模块开始 --><!-- 注册模块结束 -->
    <!-- 主体开始 -->
    <div class="main">
    	<!-- 左边开始 -->
    	<div class="list-left">
        	<?php include("left.php");?>
        </div>
        <!-- 左边结束 -->
   		<!-- 右边开始 -->
   		<?php
   			$sql_show=mysql_query("select * from tb_aboutus order by id desc limit 0,1",$conn); 
			$info_show=mysql_fetch_array($sql_show);
		 ?>
        <div class="list-right">
        	<div class="show-submenu"><a href="index.php">系统首页</a> - <a href="about.php?mod=about">关于我们</a></div>
            <!-- 文章列表BANNER开始 --> 
            <div class="txt-banner"><img src="images/a-banner.png" /></div>
            <!-- 文章列表BANNER结束 -->
            <!-- 文章详细查看开始 -->
            <div class="show-main-box">
                <div class="nwes-view-tit">关于我们</div>
                <div class="nwes-view-lmname margin-top-20">
                </div>
            	<p>广州博越信息科技有限公司成立于2009年，是一家技术创业型的新生信息科技公司，目前公司专注于自主电子商务系统的研究与开发，致力于研究、开发拥有自主知识产权的新技术架构产品。</p>
<p>公司以<span class="color-blue">&ldquo;不甘平凡，共创事业&rdquo;</span>为核心价值；以<span class="color-blue">&ldquo;博采众长，追求卓越&rdquo;</span>为团队精神；以<span class="color-blue">&ldquo;守时、守信、省钱&rdquo;</span>为经营理念；以<span class="color-blue">&ldquo;人性化、专业化、标准化&rdquo;</span>为职业发展目标。</p>
<p>现在阶段我们的主要业务：<span class="color-blue">网站建设、视觉设计、系统开发。</span></p>
<p>服务承诺:</p>
<p>我们注重于每一项工作的质量与细节，而不在于业务量的多少，提升客户满意度是我们致力追求的目标。不论您是个人、企业、单位、或业内各界同盟，只要您有需要，我们将全力以赴为您提供最贴心的服务。</p>
<p><br />
&nbsp;</p>
<p class="color-blue">关于博唯思（bowos）团队：</p>
<p>博唯思（bowos）团队成立于2006年，前身为奉古团队，是一支拥有激情、梦想、踏实的创业团队。</p>
<p>Bowos,中文名:博唯思；寓意：<span class="color-blue">博大、唯美、智慧</span>,这是博唯思团队力量的一个象征。</p>
<p>博大&mdash;&mdash;上下天光 一碧万顷；唯美&mdash;&mdash;眼光宽睿 力求完美；智慧&mdash;&mdash;博采众长 锐志进取。</p>            </div>
            <!-- 文章详细查看结束 -->
		</div>
        <!-- 右边结束 -->
        <div class="clearfix"></div>
    </div>
    <!-- 主体结束 -->
   <?php include("bottom.php");?>