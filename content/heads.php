<?php
// Require the minequery class
if(DIRECTORY != "index") {
	require_once("../api/minequery.class.php");
}

// Die if no parameters
if(!$_GET['server']) {
	die("Missing parameter \"server\"!");
}

// Support image only calls
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
$count = $list['playerCount'];

// Check amount of players
if($count != 0) {
	// Display faces
	foreach ($playerlist as $value) {
		echo '<img name="'.$value.'" style="-webkit-border-radius: 1.9px; -moz-border-radius: 1.9px; border-radius: 1.9px; border: 1px solid black; margin-right: 3px; margin-bottom: 2px;" height="32px" title="'.$value.'" alt="'.$value.'" src="'.$avatar.'?p='.$value.'&size=32" />';
	}
}
else {
	echo "<div style='height: 32px;'></div>";
}

?>