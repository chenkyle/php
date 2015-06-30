<link rel="stylesheet" type="text/css" href="css/master.css" />
<link rel="stylesheet" type="text/css" href="css/forms.css" />
<?php
include("conn/conn.php");
?>
   <!-- 注册模块开始 -->
    <div class="banner">
        <!-- 高级搜索模块开始 -->
<script language="javascript">
function chkinput1(form){
if(form.name.value==""){alert("请输入关键字!");form.name.select();return(false);}
if(form.jg.value==""){alert("请输入商品价格!");form.jg.select();return(false);}
return(true);}
</script>
        <form name="form1" method="post" action="highfindlist.php" onSubmit="return chkinput1(this)" target="_parent">
        <div class="search-title"></div>
        <div class="search-ico"></div>
        <div class="search-main">
        	<li>输入关键字:<input name="name" type="text" class="inputcss width-320" id="name" size="25"><dbo>模糊:<input name="mh" class="checkboxcss" type="checkbox" value="1" checked></bdo></li>
            <li>价格区间:
             <select name="dx">
                        <option value="1">大于</option>
                        <option selected value="-1">小于</option>
                        <option value="0">等于</option>
             </select>
            &nbsp;
                <select name="jg">
                  <option selected value=100>100</option>
                  <option  value=500>500</option>
                  <option value=1000>1000</option>
                  <option value=200>2000</option>
                  <option value=5000>5000</option>
                  <option value=10000>10000</option>
                </select>
            元</li>
        </li>
         	<li>商品类别:
         	<select name="lb" class="inputcss left-30">
                        <?php
				 $sql=mysql_query("select * from tb_type order by id desc",$conn);
				 $info=mysql_fetch_array($sql);
				 if($info==false)
				   {
				     echo " <option>本站暂无商品类别</option>";
				   }
				  else
				  { 
				    do
					 {
				?>
                        <option value=<?php echo $info[id];?>><?php echo $info[typename];?></option>
                        <?php
				     }while($info=mysql_fetch_array($sql));
				 }
				?>
                      </select>
        </li>
        	<li><input name="submit2" type="submit" class="buttoncss" value="开始查找" title="开始查找"></li>
    </div>
    </form>
        <!-- 高级搜索模块结束 -->      
	</div>
    <!-- 注册模块结束 -->