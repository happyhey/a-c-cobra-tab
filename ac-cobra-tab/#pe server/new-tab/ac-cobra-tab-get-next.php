<?php
echo base64_decode('MQ==');
$str = file_get_contents('ac-cobra-tab.json');
$data = json_decode($str);
if(count($data)>0)
{
	getNextId();
}
function getNextId()
{
	global $data;
	$linkPos = mt_rand(0, count($data) -1 );
	$link = $data[$linkPos];
	$pos = stripos($link, '?idx=');
	if($pos!==FALSE)
	{
		$idx = base64_decode(urldecode( substr($link, $pos + 5) ));
		array_splice($data, $linkPos, 1);
		echo $idx."|".$link;
	}
	return $idx;
}
?>