<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>设置时间</title>
<link rel="stylesheet" type="text/css" href="../css/forms.css">
<script language="javascript">
	function chkinput(form)
	{
	  if(form.begintime_shi.value>form.endtime_shi.value){alert("结束时间必须大于开始时间!");return(false);}
	  if(form.begintime_shi.value==form.endtime_shi.value&&form.begintime_fen.value>form.endtime_fen.value){alert("结束时间必须大于开始时间!");return(false);}
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
    <td colspan="4"><div class="main-title">订餐时间设置</div></td>
  </tr>
	  <tr>
	    <td>三餐选择</td>
        <td>开始时间</td>
        <td >结束时间</td>
      </tr>
      <tr>
      <td>
        	<select name="cantype" class="inputcss">
            <option value="0" selected>早餐</option>
            <option value="1" >午餐</option>
            <option value="2" >晚餐</option>
            </select>      
      </td>
        <td>
        时：<select name="begintime_shi" class="inputcss">
          <?php 
				  for($i=0;$i<=23;$i++)
				  {if($i<=9){$i="0".$i;}else{$i=$i;}
				 ?>
          <option><?php echo $i;?></option>
          <?php 
				  }
				 ?>
        </select>
        &nbsp;&nbsp;分：<select name="begintime_fen" class="inputcss">
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
        时：<select name="endtime_shi" class="inputcss">
          <?php 
				  for($i=0;$i<=23;$i++)
				  {if($i<=9){$i="0".$i;}else{$i=$i;}
				 ?>
          <option><?php echo $i;?></option>
          <?php 
				  }
				 ?>
        </select>
       &nbsp;&nbsp;分：<select name="endtime_fen" class="inputcss">
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
        <td colspan="4" ><input name="submit" type="submit" class="buttoncss" id="submit" value="设置">
        &nbsp;&nbsp;<input type="button" onClick="history.back();" value="返回" class="buttoncss"></td>
      </tr>
</table>
</form>
</div>
</body>
</html>
