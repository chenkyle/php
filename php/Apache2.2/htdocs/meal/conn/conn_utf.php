<?php
     $conn=mysql_connect("localhost","root","root") or die("���ݿ���������Ӵ���".mysql_error());
     mysql_select_db("db_bowos_dc",$conn) or die("���ݿ���ʴ���".mysql_error());
 	 mysql_query("set character set utf8");
     mysql_query("set names utf8");
?>
