<?php
$str = file_get_contents('ac-cobra-tab.json');
$data = json_decode($str);
if(count($data)>0)
{
	$linkPos = mt_rand(0, count($data) -1 );
	header("Location: ".$data[$linkPos]);
	die(0);
}
?>