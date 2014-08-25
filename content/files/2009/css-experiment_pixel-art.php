<?php
function generatePassword($length=9, $strength=0) {
	$vowels = 'aeuy';
	$consonants = 'bdghjmnpqrstvz';
	if ($strength & 1) {
		$consonants .= 'BDGHJLMNPQRSTVWXZ';
	}
	if ($strength & 2) {
		$vowels .= "AEUY";
	}
	if ($strength & 4) {
		$consonants .= '23456789';
	}
	if ($strength & 8) {
		$consonants .= '@#$%';
	}
 
	$password = '';
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}

$res_min = 2;
$res_max = 30;

$cellSize = 30;


if (!isset($_GET["dummy"])) {
	if (isset($_GET["res"])) {
		header( 'Location: ?id='.generatePassword(4,4).'R'.$_GET["res"]);
	} else if (!isset($_GET["id"])) {
		header( 'Location: ?id='.generatePassword(4,4).'R8');
	} else if (strpos($_GET["id"], "R") != 4) {
		header( 'Location: ?id='.generatePassword(4,4).'R8');
	} else {
		$res = substr($_GET["id"],strpos($_GET["id"], "R")+1);
		if (preg_match("/[^0-9]/",$res) != 0) {
			header( 'Location: ?id='.generatePassword(4,4).'R8');
		}
		
		$id = $_GET["id"];
		$res = (int) $res;
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CSS experiment: pixel art</title>
		<?php if (!isset($_GET["dummy"])) { ?>
		<link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.8.0r4/build/reset/reset-min.css" />
		<style type="text/css">
			html, body {
				width:100%;
				height:100%;
				background-color:#000;
			}
		
			html, body, div {
				padding:0;
				margin:0;
				border:none;
			}
			
			div#base {
				float:left;
				width:<?php echo $res*$cellSize;?>px;
				height:<?php echo $res*$cellSize;?>px;				
				background-color:#fff;
			}
			
			div#base a{
				float:left;
				width:<?php echo $cellSize;?>px;
				height:<?php echo $cellSize;?>px;
				padding:0;
				margin:0;
				font-size:0px;
				background-color:#fff;
			}
			
			div#base a:hover, div#base a:focus{
				background-color:#ccc;
			}
			
			div#base a:visited{
				background-color:#333;
			}
			
			iframe {
				width:1px;
				height:1px;
				display:none;
			}
			
			h1 {
				font-size: 14px;
				font-weight: bold;
			}
			
			h2 {
				font-size: 14px;
				font-weight: normal;
			}
			
			p {
				margin: 5px 0;
				font-size: 12px;
				color: #CCC;
			}
			
			div#info {
				background-color: #666;
				float: left;
				color: #fff;
				margin: 0;
				padding: 10px;
				width: 256px;
				font-family:Verdana, Geneva, Arial, Helvetica, sans-serif;
			}
			
			div#info form{
				background-color: #555;
				padding: 10px;
				margin: 30px auto;
			}
			
			div#info form *{
				display: block;
				padding: 0;
				margin: 0;
			}
			
			div#info form select, div#info form input {
				margin: 0 0 10px 0;
			}
			
			div#info a{
				color: #fff;
			}
		</style>
		<?php } ?>
	</head>
	<body>
		<?php if (!isset($_GET["dummy"])) { ?>
		<div id="base"><?php $num = $res*$res; while($num--) { echo "<a href='?dummy=".$id.'-'.$num."' target='dummyFrame'></a>";} ?></div>
		<div id="info">
			<h1>CSS experiment: pixel art</h1>
			<p>
				Author: <a href="http://www.onthewings.net/">Andy Li</a><br />
				Version: 2009-11-24
			</p>
			<h2>Click on the white area to draw some pixel art.<br />
			The drawing is auto stored in your browsing history (try refresh or open a new tab with same url).<br />
			Notice that there is no eraser... or you clear your browsing history :P</h2>
			<p>This is a CSS-only experiment. It works on IE(6,7,8), FireFox, Safari, Chrome, Opera and more. Keyboard natvigation(tab and enter) is supported too!</p>
			<p>PHP is used in the back-end to generate the HTML and getting a formated random id.</p>
			<p><a href="http://blog.onthewings.net/2009/11/24/css-only-experiements/">See my blog post for more info.</a></p>
			<form action="">
				<p>
					<label for="res">resolution</label>
					<select id="res" name="res">
						<?php for ($i = $res_min ; $i <= $res_max ; ++$i) {?>
						<option <?php if ($res == $i) {echo 'selected="selected"';} ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</p>		
				<p>
					<input type="submit" value="new drawing" />
					<input type="hidden" name="rnd" value="<?php echo rand(); ?>" />
				</p>
			</form>
		</div>
		
		<iframe id="dummyFrame" name="dummyFrame" />
		<script type="text/javascript">
		var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
		document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
		</script>
		<script type="text/javascript">
		try {
		var pageTracker = _gat._getTracker("UA-5072043-1");
		pageTracker._trackPageview();
		} catch(err) {}
		</script>
		<?php } ?>
	</body>
</html>