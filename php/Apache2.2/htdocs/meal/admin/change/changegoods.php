<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>���Ĳ˵���Ϣ</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<?php 
//�������߱༭��
include("../FCKeditor/fckeditor.php") ; 
?> 
</head>
<?php 
  include("../conn/conn.php");
  $sql1=mysql_query("select * from tb_shangpin where id=".$_GET[id]."",$conn);
  $info1=mysql_fetch_array($sql1);
?>
<body>
<div class="main">
<script language="javascript">
function chkinput(form){
if(form.mingcheng.value==""){alert("������˵�����!");form.mingcheng.select();return(false);}
if(form.huiyuanjia.value==""){alert("������˵���Ա��!");form.huiyuanjia.select();return(false);}
if(form.shichangjia.value==""){alert("������˵��г���!");form.shichangjia.select();return(false);}
if(form.dengji.value==""){alert("������˵��ȼ�!");form.dengji.select();return(false);}
if(form.shuliang.value==""){alert("������˵�����!");form.shuliang.select();return(false);}
return(true);}
</script>
        <form name="form1"  enctype="multipart/form-data" method="post" action="../save/savechangegoods.php?id=<?php echo $_GET[id];?>" onSubmit="return chkinput(this)">

<table>
  <tr>
    <td colspan="2"><div class="main-title">���Ĳ˵���Ϣ</div></td>
  </tr>
          <tr>
            <td>����</td>
            <td><div align="left">
                <input type="text" name="mingcheng" size="25" class="inputcss" value="<?php echo $info1[mingcheng];?>">
            </div></td>
          </tr>
          <tr>
            <td>ʱ��</td>
            <td><div align="left">
                <select name="nian" class="inputcss">
                  <?php 
  for($i=1995;$i<=2050;$i++)
  {
 ?>
                  <option <?php if(substr($info1[addtime],0,4)==$i){echo "selected";}?>><?php echo $i;?></option>
                  <?php 
  }
 ?>
                </select>
                ��
                <select name="yue" class="inputcss">
                  <?php 
            for($i=1;$i<=12;$i++)
             {
            ?>
                  <option <?php if(substr($info1[addtime],5,1)==$i){echo "selected";} ?>><?php echo $i;?></option>
                  <?php 
             }
             ?>
                </select>
                ��
                <select name="ri" class="inputcss">
                  <?php 
            for($i=1;$i<=31;$i++)
             {
            ?>
                  <option <?php if(substr($info1[addtime],7,1)==$i){echo "selected";} ?>><?php echo $i;?></option>
                  <?php 
             }
             ?>
                </select>
                ��</div></td>
          </tr>
          <tr>
            <td>�۸�</td>
            <td><div align="left">�г��ۣ�
                    <input type="text" name="shichangjia" size="10" class="inputcss" value="<?php echo $info1[shichangjia];?>">
                Ԫ&nbsp;&nbsp;��Ա�ۣ�
                <input type="text" name="huiyuanjia" size="10" class="inputcss" value="<?php echo $info1[huiyuanjia];?>">
                Ԫ</div></td>
          </tr>
          <tr>
            <td>����</td>
            <td><div align="left">
                <?php
			$sql=mysql_query("select * from tb_type order by id desc",$conn);
			$info=mysql_fetch_array($sql);
			if($info==false)
			{
			  echo "������Ӳ˵�����!";
			}
			else
			{
			?>
                <select name="typeid" class="inputcss">
                  <?php
			do
			{
			?>
                  <option value=<?php echo $info[id];?> <?php if($info1[typeid]==$info[id]) {echo "selected";}?>><?php echo $info[typename];?></option>
                  <?php
			}
			while($info=mysql_fetch_array($sql));
			?>
                </select>
                <?php
		     }
		    ?>
            </div></td>
          </tr>
          <tr>
            <td>�ȼ�</td>
            <td><div align="left">
                <select name="dengji" class="inputcss">
                  <option value="��Ʒ" <?php if(trim($info1[dengji])=="��Ʒ"){echo "selected";}?>>��Ʒ</option>
                  <option value="һ��" <?php if(trim($info1[dengji])=="һ��"){echo "selected";}?>>һ��</option>
                  <option value="��̭" <?php if(trim($info1[dengji])=="��̭"){echo "selected";}?>>��̭</option>
                </select>
            </div></td>
          </tr>
          <tr>
            <td>����</td>
            <td><div align="left">
                <select name="tuijian" class="inputcss" >
                  <option value=1 <?php if($info1[tuijian]==1) {echo "selected";}?>>�����Ƽ�</option>
                  <option value=2 <?php if($info1[tuijian]==2) {echo "selected";}?>>���ʲ�ʽ</option>
                  <option value=3 <?php if($info1[tuijian]==3) {echo "selected";}?>>�ؼ��ײ�</option>
                  <option value=4 <?php if($info1[tuijian]==4) {echo "selected";}?>>Ӫ���ײ�</option>
                </select>
            </div></td>
          </tr>
          <tr>
            <td>����</td>
            <td><div align="left">
                <input type="text" name="integral" class="inputcss" size="20" value="<?php echo $info1[integral];?>">
            </div></td>
          </tr>
          <tr>
            <td>����</td>
            <td><div align="left">
                <input type="text" name="shuliang" class="inputcss" size="20" value="<?php echo $info1[shuliang];?>">
            </div></td>
          </tr>
          <tr>
            <td>ͼƬ</td>
            <td><div align="left">
			<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="upfile" type="file" class="inputcss" id="upfile" size="30">
                <img src="../images/yes.gif" border="0">
            </div></td>
          </tr>
          <tr>
            <td>���</td>
            <td><div align="left">
<!--            <textarea name="EditorDefault" rows="8" cols="70"></textarea>-->
            	<?php 
			$oFCKeditor = new FCKeditor('EditorDefault'); 
			// FCKeditor����Ŀ¼,���·��һ��Ҫ�������Ǹ�����·��һ�£�����ᱨ��:�Ҳ���fckeditor.htmlҳ�� 
			$oFCKeditor->BasePath = '../FCKeditor/' ;
			$oFCKeditor->Height = '450px';
			$oFCKeditor->Width = '100%';
			$oFCKeditor->ToolbarSet='Default';
			$oFCKeditor->Value=$info1[jianjie];
			// ��FCKeditorʵ���� 
			$oFCKeditor->Create() ; 
				?> 
            	
            </div></td>
          </tr>
          <tr>
            <td colspan="2">
              <input type="submit" class="buttoncss" value="����">
              &nbsp;&nbsp;
                <input type="reset" value="����" class="buttoncss">&nbsp;&nbsp;
                <input type="button" onClick="history.back();" value="����" class="buttoncss">
            </td>
          </tr>
        
</table></form>
</div>
</body>
</html>
