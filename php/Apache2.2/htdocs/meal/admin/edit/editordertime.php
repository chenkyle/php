<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>����ʱ��</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script language="javascript">
	function chkinput(form)
	{
	  if(form.begintime_shi.value>form.endtime_shi.value){alert("����ʱ�������ڿ�ʼʱ��!");return(false);}
	  if(form.begintime_shi.value==form.endtime_shi.value&&form.begintime_fen.value>form.endtime_fen.value){alert("����ʱ�������ڿ�ʼʱ��!");return(false);}
	  return(true);
	}
    </script>
</head>
<?php include("../conn/conn.php");?>
<body>
<div class="main">
<form name="form1"  method="post" action="../save/saveordertime.php" onSubmit="return chkinput(this)">
<table>
  <tr>
    <td colspan="4"><div class="main-title">����ʱ������</div></td>
  </tr>
	  <tr>
	    <td>����ѡ��</td>
        <td>��ʼʱ��</td>
        <td >����ʱ��</td>
      </tr>
      <tr>
      <td>
        	<select name="cantype" class="inputcss">
            <option value="0" selected>���</option>
            <option value="1" >���</option>
            <option value="2" >���</option>
            </select>      
      </td>
        <td>
        ʱ��<select name="begintime_shi" class="inputcss">
          <?php 
				  for($i=0;$i<=23;$i++)
				  {if($i<=9){$i="0".$i;}else{$i=$i;}
				 ?>
          <option><?php echo $i;?></option>
          <?php 
				  }
				 ?>
        </select>
        &nbsp;&nbsp;�֣�<select name="begintime_fen" class="inputcss">
          <?php 
				  for($i=0;$i<=60;$i++)
				  {if($i<=9){$i="0".$i;}else{$i=$i;}
				 ?>
          <option><?php echo $i;?></option>
          <?php 
				  }
				 ?>
        </select>
        </td>
        <td>
        ʱ��<select name="endtime_shi" class="inputcss">
          <?php 
				  for($i=0;$i<=23;$i++)
				  {if($i<=9){$i="0".$i;}else{$i=$i;}
				 ?>
          <option><?php echo $i;?></option>
          <?php 
				  }
				 ?>
        </select>
       &nbsp;&nbsp;�֣�<select name="endtime_fen" class="inputcss">
          <?php 
				  for($i=0;$i<=60;$i++)
				  {if($i<=9){$i="0".$i;}else{$i=$i;}
				 ?>
          <option><?php echo $i;?></option>
          <?php 
				  }
				 ?>
        </select>
        </td>
      </tr>
      <tr>
        <td colspan="4" ><input name="submit" type="submit" class="buttoncss" id="submit" value="����">
        &nbsp;&nbsp;<input type="button" onClick="history.back();" value="����" class="buttoncss"></td>
      </tr>
</table>
</form>
</div>
</body>
</html>
