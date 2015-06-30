<html>
<table>
<?php
       include("../conn/conn.php");
       
       sission_start();
	   $adminname=$_SESSION[admin];
       $sql=mysql_query("select * from tb_admin where name='$adminname' ",$conn);
	
        ?>
           <tr class="main-tit">
          <td>用户名</td>
          <td>Email</td>
          <td>加入时间</td>
          <td>操作</td>
          <td>批量</td>
        </tr>
       <?php
	      while($info1=mysql_fetch_array($sql1))
		     {
	   ?>
	   <tr>
          <td><?php echo $info1[name];?></td>
          <td ><?php  echo $info1[email]; ?></td>
          <td ><?php  echo $info1[time]; ?></td>
          <td>
          <input name="button" type="button" class="buttoncss" id="button"
			onClick="javascript:window.location='../add/addadmin.php?id=<?php echo $info1[id];?>';"
			value="编辑">
          </td>
          <td>
          <input type="checkbox" class="checkBoxList-item" name="<?php echo $info1[id];?>" value=<?php echo $info1[id];?>></td>
        </tr>
		<?php
	        }
		?>
</table>	   
<html>	   