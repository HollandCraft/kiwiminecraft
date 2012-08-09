<?php 
// Require API
require_once('api/minequery.class.php');

// Die if no parameters
if(!$_GET['server']) {
	die("Missing parameter \"server\"!");
}

// Die if no parameters
if(!$_GET['avatar']) {
	die("Missing parameter \"avatar\"!");
}

// Get the server and port
$server = $_GET['server'];
$serverport = $_GET['port'];
$avatar = $_GET['avatar'];

// Avoid errors in included scripts
$_GET['server'] = $server;
$_GET['port'] = $serverport;
$_GET['avatar'] = $avatar;

// Let script know that it is not directly accessed
define("DIRECTORY", "index");

# Text
include("content/text.php");

# Linebreak
echo "<div style=\"height:3px;\"></div>";

# Pictures
include("content/heads.php");

# Linebreak
echo "<div style=\"height:3px;\"></div>";

?>