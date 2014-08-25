<?php
function map($value, $istart, $istop, $ostart, $ostop) {
	return $ostart + ($ostop - $ostart) * (($value - $istart) / ($istop - $istart));
}

function extendDivsStr($numOfChildrenPerLevel, $numOfLevel, $currentLevel = 0) {
	$resultStr = "<div class='tree level" . $currentLevel . "'></div>";
	$currentLevel++;
	while($numOfLevel-- > 0){
		$str = "";
		for ($i = 0 ; $i < $numOfChildrenPerLevel ; ++$i){
			$str .= "<div class='tree level" . $currentLevel . "'></div>";
		}
		$str = "'>" . $str . "</div>";
		
		$resultStr = str_replace("'></div>", $str, $resultStr);
		$currentLevel++;
	}
	return $resultStr;
}

$res_min = 2;
$res_max = 4;
$level_min = 3;
$level_max = 8;
$active_min = 3;
$active_max = 8;

$res = isset($_GET["res"]) && $_GET["res"] >= $res_min && $_GET["res"] <= $res_max ? $_GET["res"] : 2;
$level = isset($_GET["level"]) && $_GET["level"] >= $level_min && $_GET["level"] <= $level_max ? $_GET["level"] : 6;
$active = isset($_GET["active"]) && $_GET["active"] >= $active_min && $_GET["active"] <= $active_max ? $_GET["active"] : 3;

$divSize = 100 / $res . '%';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CSS experiment: mouse shadow</title>
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
			
			div.tree {
				float:left;
				width:<?php echo $divSize; ?>;
				height:<?php echo $divSize; ?>;
				opacity: 1;
				-webkit-transition: background-color 0.5s linear;
			}
			
			div.level0 {
				width:512px;
				height:512px;
				
				margin: 100px 0 0 100px;
				
				background-color:hsl(0, 0%, 100%);
			}
			
			<?php 
			$startActive = $level - $active;
			for ($i = $startActive ; $i <= $level ; ++$i) { 
				$digi =  round(map($i,$startActive,$level,100,0));
			?>			
			div.level<?php echo $i; ?>:hover {
				background-color: hsl(0, 0%, <?php echo $digi; ?>%);
			}
			<?php } ?>
			
			h1 {
				font-size: 14x;
				font-weight: bold;
			}
			
			h2 {
				font-size: 14x;
				font-weight: normal;
			}
			
			p {
				margin: 5px 0;
				font-size: 12px;
			}
			
			div#info {
				background-color: #666;
				float: left;
				color: #fff;
				margin: 100px 0 0 100px;
				padding: 10px;
				width: 256px;
				height: 492px;
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
	</head>
	<body>		
		<?php echo extendDivsStr($res*$res, $level); ?>
		<div id="info">
			<h1>CSS experiment: mouse shadow</h1>
			<p>
				Author: <a href="http://www.onthewings.net/">Andy Li</a><br />
				Version: 2009-11-20
			</p>
			<h2>When mouse over the white area, the cursor leaves digital shadow.</h2>
			<p>This is a CSS-only experiment. Since it uses CSS animation and CSS transform, it can only be shown perfectly in lastest version of Safari and Chrome.</p>
			<p>PHP is used in the back-end to generate the HTML. There is no tricky things there, just tired of typing those repeating things.</p>
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
					<label for="level">number of levels</label>
					<select id="level" name="level">
						<?php for ($i = $level_min ; $i <= $level_max ; ++$i) {?>
						<option <?php if ($level == $i) {echo 'selected="selected"';} ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</p>
				<p>
					<label for="active">number of mouse-active levels</label>
					<select id="active" name="active">
						<?php for ($i = $active_min ; $i <= $active_max ; ++$i) {?>
						<option <?php if ($active == $i) {echo 'selected="selected"';} ?>><?php echo $i; ?></option>
						<?php } ?>
					</select>
				</p>			
				<p><input type="submit" value="submit" /></p>
			</form>
		</div>
		
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
	</body>
</html>