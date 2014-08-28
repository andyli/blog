from __future__ import division
from jinja2 import Template
import cgi

def map(value, istart, istop, ostart, ostop):
	return ostart + (ostop - ostart) * ((value - istart) / (istop - istart))

def extendDivsStr(numOfChildrenPerLevel, numOfLevel, currentLevel = 0):
	resultStr = "<div class='tree level" + str(currentLevel) + "'></div>"
	currentLevel += 1
	while numOfLevel > 0:
		numOfLevel -= 1
		_str = ""

		for i in range(numOfChildrenPerLevel):
			_str += "<div class='tree level" + str(currentLevel) + "'></div>"

		_str = "'>" + _str + "</div>"
		
		resultStr = resultStr.replace("'></div>", _str)
		currentLevel += 1
	
	return resultStr

res_min = 2
res_max = 4
level_min = 3
level_max = 8

GET = cgi.FieldStorage()

res = int(GET.getvalue("res")) if (("res" in GET) and (res_min <= int(GET.getvalue("res")) <= res_max)) else 2;
level = int(GET.getvalue("level")) if (("level" in GET) and (level_min <= int(GET.getvalue("level")) <= level_max)) else 5;
active = level - 1

divSize = str(100 / res) + '%'

def divLevel():
	startActive = level - active
	strs = ""
	for i in range(startActive, level+1):
		digi = round(map(i,startActive,level,10,90))
		strs += """
			div.level{i} {{
				background-color: hsl(0, 0%, {digi}%);
				-webkit-transform: rotate(45deg);
				-moz-transform: rotate(45deg);
			}}
			
			div.level{i}:hover {{
				background-color: hsl(0, 0%, {digi2}%);
				-webkit-transform: rotate(0deg);
				-moz-transform: rotate(0deg);
			}}
			""".format(i=i, digi=digi, digi2=90 - digi)
	return strs

def options(min,max,selected):
	strs = ""
	for i in range(min, max+1):
		strs += "<option {}>{}</option>".format('selected="selected"' if selected == i else "", i)
	return strs

print Template("""
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en"> 
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>CSS experiment: gear</title>
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
				width:{{divSize}};
				height:{{divSize}};
				opacity: 1;
				-webkit-transform-origin: 50% 50%;
				-webkit-transition: -webkit-transform 1s linear, background-color 1s linear;
			}
			
			div.level0 {
				width:512px;
				height:512px;
				
				margin: 100px 0 0 100px;
				
				background-color:#fff;
			}
			
			{{divLevel()}}
			
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
				color: #CCC;
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
				padding: 5px;
				margin: 4px auto;
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
		{{extendDivsStr(res*res, level)}}
		<div id="info">
			<h1>CSS experiment: gear</h1>
			<p>
				Author: <a href="http://www.onthewings.net/">Andy Li</a><br />
				Version: 2009-11-20
			</p>
			<h2>When mouse over the squares, they rotate like gears.</h2>
			<p>This is a CSS-only experiment. Since it uses CSS animation and CSS transform, it can only be shown perfectly in lastest version of Safari and Chrome.</p>
			<p>PHP is used in the back-end to generate the HTML. There is no tricky things there, just tired of typing those repeating things.</p>
			<p><a href="http://blog.onthewings.net/2009/11/24/css-only-experiements/">See my blog post for more info.</a></p>
			<form action="">
				<p>
					<label for="res">resolution</label>
					<select id="res" name="res">
						{{options(res_min,res_max,res)}}
					</select>
				</p>
				<p>
					<label for="level">number of levels</label>
					<select id="level" name="level">
						{{options(level_min,level_max,level)}}
					</select>
				</p>				
				<p><input type="submit" value="submit" /></p>
			</form>
			<p><a href="http://www.chromeexperiments.com/detail/gear/"><img src="/files/2009/badge-black_black.png" alt="See my Experiment on ChromeExperiments.com" /></a></p>
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
""").render(vars())