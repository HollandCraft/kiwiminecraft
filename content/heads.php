<?php
error_reporting(0);

// Require the minequery class
if(DIRECTORY != "index") {
	require_once("../api/minequery.class.php");
}
require_once('../config.php');

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
?>
<?php if(FADING === true): ?>

<script type="text/javascript">
var fadeEffect=function(){
    return {
        init:function(id, flag, target){
            this.elem = document.getElementById(id);
            clearInterval(this.elem.si);
            this.target = target ? target : flag ? 100 : 0;
            this.flag = flag || -1;
            this.alpha = this.elem.style.opacity ? parseFloat(this.elem.style.opacity) * 100 : 0;
            this.si = setInterval(function(){fadeEffect.tween()}, 20);
        },
        tween:function() {
            if(this.alpha == this.target){
                clearInterval(this.elem.si);
            }
            else {
                var value = Math.round(this.alpha + ((this.target - this.alpha) * .05)) + (1 * this.flag);
                this.elem.style.opacity = value / 100;
                this.elem.style.filter = 'alpha(opacity=' + value + ')';
                this.alpha = value
            }
        }
    }
}();
</script>
<script>
	var total = <?php echo $count; ?>;
	var other = 0;
	function addOne() {
		other = other + 1;
		if(other == total) {
			fadeEffect.init('head', 1, 100);
		}
	}
</script>
<?php endif; ?>
<?php
// Check amount of players
if(FADING === true) {
	$onload = "onload=\"addOne();\"";
	$visibility = "style=\"opacity: 0.0;\"";
}
else {
	$onload = "";
	$visibility = "";
}

echo "<div id=\"head\" $visibility >";
if($count != 0) {
	// Display faces
	foreach ($playerlist as $value) {
		echo "<img $onload name=\"$value\" style=\"-webkit-border-radius: 1.9px; -moz-border-radius: 1.9px; border-radius: 1.9px; border: 1px solid black; margin-right: 3px; margin-bottom: 2px;\" height=\"32px\" width=\"32px\" title=\"$value\" alt=\"$value\" src=\"$avatar?p=$value&size=32\" />";
	}
}
else {
	echo "<div style='height: 32px;'></div>";
}
echo "</div>";

?>