<?php
$skipScripts = $_GET['noscript'] == 'Yes';

$shareUrl = $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";//"https://www.happyhey.com";
$shareText = "Like it? Share it to make the world a happier place!";

if($skipScripts)
	$shareUrl = "https://www.happyhey.com";
	
$cookieId = $_COOKIE['nextPic'];
$found = false;
if($_GET['idx']!='')
{
	$id = base64_decode($_GET['idx']);
	$found = true;
}
if(!$found && $cookieId != ''){
	$id = $cookieId;
}

$str = file_get_contents('../../new-tab/ac-cobra-tab.json');
$data = json_decode($str);

$cacheTime = @filemtime('../../new-tab/quotes-cache.json') * 1;
$cacheDuration = 24 * 60 * 60;
if($cacheTime == 0 || $cacheTime + $cacheDuration < time() ){
	$jsonFile = 'https://www.happyhey.com/data/quotes.json';
	$str = file_get_contents($jsonFile);
	file_put_contents('../../new-tab/quotes-cache.json', $str);
}
else{
	$str = file_get_contents('../../new-tab/quotes-cache.json');
}
$quotes = json_decode($str);
$quotes = $quotes->quotes;

$str = file_get_contents("../../data/advice.json");
$advices = json_decode($str);
if(!empty($advices))
	$advices = $advices->quotes;
/*

    switch (json_last_error()) {
        case JSON_ERROR_NONE:
            echo ' - No errors';
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
    }
*/
if(!$found)
	$id=getNextId();
	
$id1 = getNextId();
if($id1 == $id)
	$id1 = getNextId();

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
	}
	return $idx;
}
$communicationID = 'ext_'.time().'_'.mt_rand();
if(!$skipScripts){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" prefix="og: http://ogp.me/ns#">
<?php
$filepath = dirname(__FILE__).'/../../images/ac-cobra-tab/'.$id. '.jpg';if(!file_exists($filepath)) {	die('File does not exist');}
?>
<head>
<link rel="shortcut icon" href="https://www.happyhey.com/favicon.png" type="image/png"/>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta property="og:image" content="https://www.happyhey.com/images/ac-cobra-tab/<?php echo $id; ?>.jpg" />
<meta property="og:title" content="Do You Like AC Cobra?" />
<meta property="og:description" content="Get awesome AC Cobra HD images in each new Chrome tab!" />
<meta name="twitter:image" content="https://www.happyhey.com/images/ac-cobra-tab/<?php echo $id; ?>.jpg" />
<title>Do You Like AC Cobra?</title>
<link rel="stylesheet" href="../../css/bootstrap.min.css"/>
<style>
@-moz-keyframes scale1 { /* firefox */
	0%   { transform: scale(1);}
	50%   { transform: scale(1.05); }
	100%   { transform: scale(1); }
}

@-webkit-keyframes scale1 { /* Webkit */
	0%   { transform: scale(1);}
	50%   { transform: scale(1.05); }
	100%   { transform: scale(1); }
}

#down {
    border-color: #000 transparent transparent transparent;
    border-style: solid;
    border-width: 25px 100px 0;
    cursor: pointer;
    display: block;
    height: 0;
    left: 50%;
    margin-left: -100px;
    opacity: 0.25;
    position: fixed;
    right: 50%;
    width: 0;
	bottom:0px;
    z-index: 99998;
	display:none;
	animation:         scale1 0.9s infinite;
	-moz-animation:    scale1 0.9s infinite;
	-webkit-animation: scale1 0.9s infinite;
}
</style>	<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71898243-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<body>
	 <div style="position:fixed; z-index:99999; top: 0px; left:0; right: 0; text-align:center;"><iframe src="https://www.happyhey.com/banner5/?cid=<?php echo $communicationID?>" width="100%" height="90px" scrolling="no" frameBorder="0">
</iframe>      
            
            </div>
<?php
}
?>
	<!-- from  -->
	
	
	<a id="down" href="https://www.happyhey.com/share/ac-cobra-tab/share.php?idx=<?php echo urlencode(base64_encode($id1))?>"></a>
	<div id="imgPh">
		<img id="back-img" alt="Do you like it? Share it!" title="Do you like it? Share it! Scroll down for more!"  src="https://www.happyhey.com/images/ac-cobra-tab/<?php echo $id; ?>.jpg" style="width: 100%; height: auto; position: fixed; top: 0; left: 0; ">
	</div>
<?php if(!$skipScripts){?>
	<div style="position:fixed; z-index:99998; bottom: 61px; left:0; right: 0; text-align:center;z-index: 10;">
		<div style="text-align:center; padding:5px 10px; background-color:#f5f5f5; color:#000; display: inline-block;">
	<!--We ♥: --><?php
	//$links = file("../../data/links.txt");
	mt_srand(time());
	$maxLinks = 1;
	for($i=0; $i< $maxLinks; $i++)
	{
		$quote = $quotes[mt_rand(0, count($quotes)-1)];
	?>
	<a style="color:#000;"><?php echo $quote->message?> (<?php echo $quote->source?>)</a>
	<?php
		if($i < $maxLinks - 1)
			echo " | ";
	}
	?>
		</div>
	</div>
	</div>
	<div style="position:fixed; z-index:99998; bottom: 30px; left:0; right: 0; text-align:center;z-index: 11; min-height: 30px;">
		<div style="text-align:left; padding:5px 10px; background-color:#f5f5f5; color:#000; display: inline-block; position: relative; padding-right: 25px;" class="advice_container">
			<div style="position: absolute; right: 0; top: 0; cursor: pointer;" class="maximize"><img src="//www.happyhey.com/assets/img/maximize.png" width="30" height="30"></div>
			<div style="position: absolute; right: 0; top: 0; cursor: pointer;display:none;" class="minimize"><img src="//www.happyhey.com/assets/img/minimize.png" width="30" height="30"></div>
		<?php
		mt_srand(time());
		$advice = $advices[mt_rand(0, count($advices)-1)];
		?>
			<h1 style="color:#000;font-size:14px; padding:0;margin:0; padding: 2px;"><?php echo $advice->title?></h1>
			<div style="display: none;" class="advice_content"><?php echo $advice->content?></div>
		<?php

		?>
		</div>
	</div>
<?php }?>
<?php if(!$skipScripts){ ?>
<script src="../../js/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>
<script src="../../js/mousewheel.js"></script>
	<script>
	var communicationID = '<?php echo $communicationID?>';
	(function () {
	
		window.addEventListener('message', function(evt){
			if(evt&&evt.data&&evt.data.indexOf(communicationID)!=-1){
				var o = false;
				try{
					o = JSON.parse(evt.data);				
				}catch(ex){};
				if(o.cmd == 'redir'){
					document.location = jQuery('#down').attr('href');
				}
			}
		})
	})(jQuery);

	<?php if(!$found){?>
		history.pushState(null, null, "https://www.happyhey.com/share/ac-cobra-tab/share.php?idx=<?php echo urlencode(base64_encode($id))?>");
	<?php }?>
	$(function(){
		setTimeout(loadFirstPic, 100);
		$('.advice_container').width( $('.advice_container').outerWidth(true));
		$('.maximize').click(function(){
			$('.advice_content').show();
			$('.maximize').hide();
			$('.minimize').show();
		});
		$('.minimize').click(function(){
			$('.advice_content').hide();
			$('.minimize').hide();
			$('.maximize').show();
		});
	});
	function loadFirstPic(){
		var img = new Image();
		img.onload = function(){
			$('#down').show();
			createCookie('nextPic', <?php echo $id1;?>, 365);
		}
		img.src = "https://www.happyhey.com/images/ac-cobra-tab/<?php echo $id1; ?>.jpg";
	}
	var navigating = false;
	$(window).mousewheel(function(event, delta, deltaX, deltaY){
		if(deltaY < 0 && !navigating){
			navigating = true;
			document.location = $('#down').attr('href');
		}
	})
	function createCookie(name, value, days) {
		var expires;
	
		if (days) {
			var date = new Date();
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
			expires = "; expires=" + date.toGMTString();
		} else {
			expires = "";
		}
		document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}
	
	function readCookie(name) {
		var nameEQ = encodeURIComponent(name) + "=";
		var ca = document.cookie.split(';');
		for (var i = 0; i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0) === ' ') c = c.substring(1, c.length);
			if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
		}
		return null;
	}
	
	</script>
<?php }?>
<?php if(!$skipScripts){ ?>

<div style="z-index:999; position: fixed; right:5px; bottom: 5px; width:300px; text-align:center;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- HappyHey Automatic -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-4179874155592098"
     data-ad-slot="3440033027"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>


</div>
</body>
</html>
<?php }?>