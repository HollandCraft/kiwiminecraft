<?php
// Require the minequery class
if(DIRECTORY != "index") {
	require_once("../api/minequery.class.php");
}

// Die if no parameters
if(!$_GET['server']) {
	die("Missing parameter \"server\"!");
}

// Support text-only calls
$server = $_GET['server'];
$serverport = $_GET['port'];

// Check if the port exists
if($_GET['port']) {
	// Query to the minequery class with supplied port
	$list = Minequery::query($server, $serverport, $timeout = 30);
}
else {
	// Query to the minequery class with default port
	$list = Minequery::query($server, $port = 25566, $timeout = 30);
}

// Saving responses
$count = $list['playerCount'];
$max = $list['maxPlayers'];
$ms = round($list['latency']);

echo "<span style=\"font-size: 15px;\">There are <span style='color: red;'>$count</span> out of <span style='color: red;'>$max</span> players online with a loading time of <span style='color: red;'>$ms</span> ms.</span>";
?>