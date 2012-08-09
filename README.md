# kiwiminecraft
Avatar and playerlist script
![License](http://i.creativecommons.org/l/by-sa/3.0/88x31.png)

## Avatar
This is handy for people who want to integrate avatars with the faces of Minecraft skins. Just upload the 'avatar.php' file to your server. Now you can navigate to the avatar file with your browser. An example avatar call looks like this: 'avatar.php?p=kiwiboom&size=100'. In this particular example the script will get kiwiboom's skin, cut out the head and resize it too 100x100 pixels. You can also call the script from our server by using this url: 'http://kiwi.la/projects/minecraft/avatar.php?p=kiwiboom&size=100'.

## Serverlist
Want to display a neat little playerlist on your website? No problem! Just download the serverlist folder and upload it on to your website. Integrating the list with your website can be a mess depending on your software, but you should be able to do it with some tweaking (you can always email me if it doesn't work: vic@kiwi.la).
First up you'll need to make sure that you're running PHP. If you're working on an HTML page, it's safe to change the extention to .php. Now insert this code where you want the playerlist:

```php
<?php
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
$playerlist = curl('http://path/to/kiwiminecraftfolder/?server=serverip&port=serverport&avatar=http://path/to/avatar.php');

// Display
echo $playerlist;
?>
```
The snippet below adds the serverlist to your site as well. I recommend this one if you want tight integration with your website.
```php
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
$text = curl('http://path/to/kiwiminecraftfolder/content/text.php?server=serverip&port=serverport');
$heads = curl('http://path/to/kiwiminecraftfolder/content/heads.php?server=serverip&port=serverport&avatar=http://path/to/avatar.php');
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
```
You can also find 2 working examples in the examples directory. The example called 'split.php' is somewhat harder to setup, but is way better if you want to fully integrate it in your site layout.

## Minequery
You need to install Minequery and open the nessecairy ports (the default Minequery port is 25566).