<link rel="stylesheet" type="text/css" href="css/master.css" />
<link rel="stylesheet" type="text/css" href="css/forms.css" />
<?php
include("conn/conn.php");
?>
   <!-- ע��ģ�鿪ʼ -->
    <div class="banner">
        <!-- �߼�����ģ�鿪ʼ -->
<script language="javascript">
function chkinput1(form){
if(form.name.value==""){alert("������ؼ���!");form.name.select();return(false);}
if(form.jg.value==""){alert("��������Ʒ�۸�!");form.jg.select();return(false);}
return(true);}
</script>
        <form name="form1" method="post" action="highfindlist.php" onSubmit="return chkinput1(this)" target="_parent">
        <div class="search-title"></div>
        <div class="search-ico"></div>
        <div class="search-main">
        	<li>����ؼ���:<input name="name" type="text" class="inputcss width-320" id="name" size="25"><dbo>ģ��:<input name="mh" class="checkboxcss" type="checkbox" value="1" checked></bdo></li>
            <li>�۸�����:
             <select name="dx">
                        <option value="1">����</option>
                        <option selected value="-1">С��</option>
                        <option value="0">����</option>
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
            Ԫ</li>
        </li>
         	<li>��Ʒ���:
         	<select name="lb" class="inputcss left-30">
                        <?php
				 $sql=mysql_query("select * from tb_type order by id desc",$conn);
				 $info=mysql_fetch_array($sql);
				 if($info==false)
				   {
				     echo " <option>��վ������Ʒ���</option>";
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
        	<li><input name="submit2" type="submit" class="buttoncss" value="��ʼ����" title="��ʼ����"></li>
    </div>
    </form>
        <!-- �߼�����ģ����� -->      
	</div>
    <!-- ע��ģ����� -->