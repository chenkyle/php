<?php
	include("conn/conn_utf.php");
	$counter = 0;
	$selectedId = strval($_GET["selectedId"]);
	$opts = "{";
	$x=$_GET["tb"];
	$id="";
	$text="";
	switch($x){
		case 1:
			$sql=mysql_query("select * from tb_provinces order by id asc",$conn);
			$id="provinceid";
			$text="province";
			break;
		case 2:
			$sql=mysql_query("select * from tb_cities where provinceid='".$selectedId."' order by id asc",$conn);
			$id="cityid";
			$text="city";
			break;
		case 3:
			$sql=mysql_query("select * from tb_areas where cityid='".$selectedId."' order by id asc",$conn);
			$id="areaid";
			$text="area";
			break;
	}
	$info=mysql_fetch_array($sql);
	do{
		if($counter > 0){
			$opts.=",";
		}
		$opts.="'";
		$opts.=$info[$id];
		$opts.="':'";
		$opts.=$info[$text];
		$opts.="'";
		$counter++;
	}while($info=mysql_fetch_array($sql));
	$opts.="}";
	echo $opts;
?>