<?php
# In this script we are using the two content files seperately
# If this doesn't work, check out the one.php file in this folder

// Use curl
function curl($url) {
    if (!function_exists('curl_init')){ 
        die('CURL is not installed!');
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

// Getting contents of playerlistfile
$text = curl('http://kiwi.la/projects/minecraft/content/text.php?server=server.freshcoal.com&port=25566');
$heads = curl('http://kiwi.la/projects/minecraft/content/heads.php?server=server.freshcoal.com&port=25566&avatar=http://kiwi.la/projects/minecraft/avatar.php');
?>
<html>
<head>
	<title>Split test</title>
	<style type="text/css">
		#text {
			font-family: Helvetica;
		}
		
		#heads {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div id="text">
		<?php echo $text; ?>
	</div>
	
	<div id="heads">
		<?php echo $heads; ?>
	</div>
</body>
</html>