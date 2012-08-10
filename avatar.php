<?php
$size = isset($_GET['size']) ? (($_GET['size']<250) ? (($_GET['size']>8) ? $_GET['size'] : 8) : 250) : 48;
$user = isset($_GET['p']) ? $_GET['p'] : 'char';

// Check if avatar has been cached
$base = dirname(__FILE__)."/";
if(file_exists("$base/cache/$user.png")) {
	$im = imagecreatefrompng("$base/cache/$user.png");
	$av = imagecreatetruecolor($size, $size);
	imagealphablending($av, false);
	imagesavealpha($av, true);
	imagecopyresampled($av, $im, 0, 0, 0, 0, $size, $size, imagesx($im), imagesy($im));
	header('Content-type: image/png');
	imagepng($av);
	imagedestroy($im);
	imagedestroy($av);
	exit();
}

// get the skin from amazon server with curl and return the avatar value
function get_avatar($user = 'char') {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://s3.amazonaws.com/MinecraftSkins/' . $user . '.png');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	$output = curl_exec($ch);
	$status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	curl_close($ch);
	if($status!='200') {
		// Default Avatar:   
		$output = 'R0lGODlhMAAQAPUuALV7Z6p9ZkUiDkEhDIpMPSgcC2pAMFI9ibSEbZxpTP///7uJciodDTMkEYNVO7eCcpZfQJBeQ5xjRkIdCsaWgL2OdL';
		$output .= '6IbL2OcqJqRyweDj8qFXpOMy8fDyQYCC8gDUIqEiYaCraJbL2Lco9ePoBTNG1DKpxyXK2AbbN7Yqx2WjQlEoFTOW9FLCseDQAAAAAAAAA';
		$output .= 'AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAACH/C1hNUCBEYXRhWE1QRD94cDIzRThDRkQwQzcyIiB4';
		$output .= 'bXBNTTpJbnN0YW5jZUlEPSJ4bXAuaWlkOkU2RTVBQzAwMDFwYWNrZXQgZW5kPSJyIj8+ACH5BAUAAC4ALAAAAAAwABAAQAZkQJdwSCwaj';
		$output .= '8ik0uVpcQodUIuxrFqv2OwRoTgAFgdFQEsum8/ocit0oYgqKVVaG4EMCATBaDXv+/+AgYKDVS2GDR8aGQWESAEIAScmCwkJjUcSKA8GBh';
		$output .= 'YYJJdGLCUDEwICDhuEQQA7';
		$output = base64_decode($output);
	}
	return $output;
}

function save($image, $dir) {
	$base = dirname(__FILE__)."/";
	imagepng($image, $base.$dir);
}

// get skin
$skin = get_avatar($user);

// display skin on screen
$im = imagecreatefromstring($skin);
$av = imagecreatetruecolor($size,$size);
imagecopyresized($av,$im,0,0,8,8,$size,$size,8,8);    // Face
imagecopyresized($av,$im,0,0,40,8,$size,$size,8,8);   // Accessories
imagealphablending($av, false);
imagesavealpha($av, true);
header('Content-type: image/png');
imagepng($av);

// Save image
$save = imagecreatetruecolor(100,100);
imagecopyresized($save,$im,0,0,8,8,100,100,8,8);    // Face
imagecopyresized($save,$im,0,0,40,8,100,100,8,8);   // Accessories
imagealphablending($save, false);
imagesavealpha($save, true);
save($save, "cache/$user.png");

// Destroy
imagedestroy($im);
imagedestroy($av);
?>