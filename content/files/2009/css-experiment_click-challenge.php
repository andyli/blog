<?php
$id = rand();
$cellSize = 580;

$maxClick = 3000;
$timeLimit = 30; //in seconds
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CSS experiment: click challenge</title>
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
				width:<?php echo $cellSize;?>px;
				height:<?php echo $cellSize*0.5;?>px;
				overflow: hidden;
				background-color:#fff;
			}
			
			div#base input{
				width:<?php echo $cellSize;?>px;
				height:<?php echo $cellSize + 20;?>px;
				display:block;
				border: 50px solid #f00;
				padding:50px;
				counter-increment: c;
			}
			
			div#base input:after {
				font-size:<?php echo $cellSize*0.5;?>px;
				color:#333;
				content: counter(c);
			}

			div#base input:checked {
				position: absolute;
				left: -999px;
				padding:0;
				height:0px;
				font-size:0px;
			}
			
			div#base input#firstClick:after {
				content: '0';
			}
			
			div#counterReset {
				counter-reset: c;
			}
			
			@-webkit-keyframes stop {
				0% {
					top:-<?php echo $cellSize*0.5-20;?>px;
					width:0px;
				}
				99.99% {
					top:-<?php echo $cellSize*0.5-20;?>px;
				}
				100% {
					top:0px;
					width:<?php echo $cellSize;?>px;
				}
			}
			
			div#stopper {
				position: absolute;
				width:<?php echo $cellSize;?>px;
				height:<?php echo $cellSize*0.5;?>px;
				background-color:#f00;
				opacity: 0.5;
				text-align: right;
				display:none;
			}
			
			div#stopper a{
				color: #000;
				font-size: 20px;
			}
			
			input#firstClick:checked + #stopper {
				display:block;
				-webkit-animation-name: stop;
				-webkit-animation-duration: <?php echo $timeLimit; ?>s;
				-webkit-animation-timing-function: linear;
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
				height: <?php echo $cellSize*0.5 - 20;?>px;
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
		<div id="base">
			<input id="firstClick" type='checkbox' />
			<div id="stopper"><a href="">replay?</a></div>
			<div id="counterReset"></div>
			<?php echo str_repeat("<input type='checkbox' />",$maxClick); ?>
		</div>
		<div id="info">
			<h1>CSS experiment: click challenge</h1>
			<p>
				Author: <a href="http://www.onthewings.net/">Andy Li</a><br />
				Version: 2009-11-22
			</p>
			<h2>Click on the white area as many time as possible in <?php echo $timeLimit; ?> seconds. The timer will start once you clicked (counter shown as 1).</h2>
			<p>This is a CSS-only experiment. It uses CSS counter, CSS keyframe animation and CSS pseudo class ":checked". It works on latest Chrome and Safari.</p>
			<p>PHP is used in the back-end to generate the HTML. There is no tricky things there, just tired of typing those repeating things.</p>
			<p><a href="http://blog.onthewings.net/2009/11/24/css-only-experiements/">See my blog post for more info.</a></p>
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