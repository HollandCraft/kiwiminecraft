Kiwiboom's Minecraft Scripts
====================

## Avatar
This is handy for people that want to integrate avatars with Minecraft skins. Just upload the 'avatar.php' file to your server. Now you can navigate to the avatar file with your browser. An example avatar call looks like this: 'avatar.php?p=kiwiboom&size=100'. In this particular example the script will get kiwiboom's skin, cut out the head and resize it too 100x100 pixels. You can also call the script from our server by using this url: 'http://kiwi.la/projects/minecraft/avatar.php?p=kiwiboom&size=100'.

## Serverlist
Want to display a neat little playerlist on your website? No problem! Just download the serverlist folder and upload it on to your website. Integrating the list with your website can be a mess depending on your software, but you should be able to do it with some tweaking (you can always email me if it doesn't work: vic@kiwi.la).
First up you'll need to make sure that you're running PHP. If you're working on an html page, it's safe to change the extention to .php. Now insert this code where you want the playerlist:

```
<?php
# You can use this snippet to integrate the serverlist into your existing website.
# You can also restyle the text and other content inside the playerlist by putting this (including php tags) inside a div.
# Make sure you are pasting this in a file ending on .php (If it's html, it is most likely safe to change that to php as your browser will read the html part as html)

// Getting contents of playerlistfile
$playerlist = file_get_contents('http://path/to/serverlistfolder/?server=serverip&port=serverport&avatar=http://kiwi.la/minecraft/avatar.php'); # Replace the avatar location with your self-hosted one for faster loading

// Echo it out
echo $playerlist;
?>
```

You also need to install minequery on your Minecraft server and open the nessecairy ports.