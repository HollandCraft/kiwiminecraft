<html>
<head>
<style type="text/css">
html, body, div, span, applet, object, iframe,
h1, h2, h3, h4, h5, h6, p, blockquote, pre,
a, abbr, acronym, address, big, cite, code,
del, dfn, em, img, ins, kbd, q, s, samp,
small, strike, strong, sub, sup, tt, var,
b, u, i, center,
dl, dt, dd, ol, ul, li,
fieldset, form, label, legend,
table, caption, tbody, tfoot, thead, tr, th, td,
article, aside, canvas, details, embed, 
figure, figcaption, footer, header, hgroup, 
menu, nav, output, ruby, section, summary,
time, mark, audio, video {
	margin: 0;
	padding: 0;
	border: 0;
	font-size: 100%;
	font: inherit;
	vertical-align: baseline;
}
/* HTML5 display-role reset for older browsers */
article, aside, details, figcaption, figure, 
footer, header, hgroup, menu, nav, section {
	display: block;
}
body {
	line-height: 1;
}
ol, ul {
	list-style: none;
}
blockquote, q {
	quotes: none;
}
blockquote:before, blockquote:after,
q:before, q:after {
	content: '';
	content: none;
}
table {
	border-collapse: collapse;
	border-spacing: 0;
}
</style>
</head>
<body>
<?php
// Require the minequery class
if($dir != "0") {
	require('minequery.class.php');
}
// Die if no parameters
if(!$_GET['server']) {
	die("Missing parameter \"server\"!");
}

// Get the server and port
$server = $_GET['server'];
$serverport = $_GET['port'];
$avatar = $_GET['avatar'];

// Check if the port exists
if($_GET['port']) {
	// Query to the minequery class with supplied port
	$list = Minequery::query($server, $serverport, $timeout = 30);
}
else {
	// Query to the minequery class with default port
	$list = Minequery::query($server, $port = 25566, $timeout = 30);
}

// Get minequery response
$playerlist = $list['playerList'];

// Display faces
foreach ($playerlist as $value) {
	echo '<img name="'.$value.'" style="-webkit-border-radius: 1.9px; -moz-border-radius: 1.9px; border-radius: 1.9px; border: 1px solid black; margin-right: 3px; margin-bottom: 2px;" height="32px" title="'.$value.'" alt="'.$value.'" src="'.$avatar.'?p='.$value.'&size=32" />';
}
?>
</body>
</html>