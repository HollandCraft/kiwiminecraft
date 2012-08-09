<?php
# In this script we are using the 'wrapper' index.php
# If this doesn't work, check out the split.php file in this folder

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
$playerlist = curl('http://kiwi.la/projects/minecraft/?server=server.freshcoal.com&port=25566&avatar=http://kiwi.la/projects/minecraft/avatar.php');

// Display
echo $playerlist;
?>