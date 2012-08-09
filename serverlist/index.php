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
// Die if no parameters
if(!$_GET['server']) {
	die("Missing parameter \"server\"!");
}

// Die if no parameters
if(!$_GET['avatar']) {
	die("Missing parameter \"avatar\"!");
}

// Let script know that it is not directly accessed
$dir = "0";

// Get the server and port
$server = $_GET['server'];
$serverport = $_GET['port'];
$avatar = $_GET['avatar'];

// Include both files with their parameters
$_GET['server'] = $server;
$_GET['port'] = $serverport;

# Text
include('list_text.php');

# Linebreak
echo "<div style=\"height:3px;\"></div>";

# Pictures
$_GET['avatar'] = $avatar;
include('list_pictures.php');

# Linebreak
echo "<div style=\"height:3px;\"></div>";

?>
</body>
</html>