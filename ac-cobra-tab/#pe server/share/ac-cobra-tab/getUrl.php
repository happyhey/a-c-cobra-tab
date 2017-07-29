<?php
$id =  $_GET['id']*1;
$id1 = $_GET['id1']*1;
if($id1>0)
{
	setcookie('nextPic', $id1, time() + (365*24*60*60));
	
	$str = file_get_contents('../../new-tab/ac-cobra-tab.json');
	$data = json_decode($str);
	$linkPos = mt_rand(0, count($data) -1 );
	$link = $data[$id1];
	echo $link;
}

?>