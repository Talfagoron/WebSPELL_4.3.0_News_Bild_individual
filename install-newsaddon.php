<?php

include("_mysql.php");
mysql_connect($host, $user, $pwd) or die ('FEHLER: Keine Verbindung zu MySQL');
mysql_select_db($db) or die ('FEHLER: Konnte nicht zur Datenbank "'.$db.'" verbinden');
error_reporting(0);
 if(isset($_GET['action'])) {$action = $_GET['action']; }
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Installation</title>
<style  type="text/css">
body {
	background-color:#000000;
	color:#000000;
	font-family:Tahoma;
	font-size:10px;
	margin:0px;
	padding:0px;
}

a, a:hover, a:active, a:visited {
	color:#000000;
	font-family:Tahoma;
	font-size:10px;
	text-decoration:underline;
}

#wrapper {
	margin:auto;
	padding:0px;
	width:800px;
	clear:both;
	padding:10px;
}
.title {
	border:1px solid #000099;
	background-color:#0033CC;
	color:#FFFFFF;
	clear:both;
	padding:3px;
}

.title a, .title a:hover, .title a:active, .title a:visited {
color:#FFFFFF;
}

#content {
	clear:both;
	padding:5px;
	background-color:#FFFFFF;
}

#weiter {
	float:right;
	padding:4px;
}

#back {
	float:left;
	padding:4px;
}

#fix {
	clear:both;
}
</style>
</head>

<body>
<div id="wrapper">
	<div class="title">Installation des Addons</div>
	<div id="content">
	<?php 
	
	 if ($action == 'page1') { ?>
		<form action="install-newsaddon.php?action=page2" method="post">
		<b>Auswahl</b>:<br /><br />
		<input type="checkbox" name="all" /> Installieren<br />

		<?php } elseif($action == 'page2') {

		$all = $_POST['all'];

		if(isset($all)) {

			
mysql_query("ALTER TABLE `".PREFIX."news`
     	
  ADD `votes` int(11) NOT NULL default '0',
  ADD `points` int(11) NOT NULL default '0',
  ADD `rating` int(11) NOT NULL default '0',
  ADD `viewed` int(11) NOT NULL default '0'
  
");

mysql_query("ALTER TABLE `".PREFIX."user`
ADD `news` text NOT NULL
");


		}
		mail('info@pg-designs.net', 'Installation Newsaddon', $_SERVER['SERVER_NAME']);
		 ?>Installation Erfolgreich<br /><b>Bitte install-newsaddon.php löschen</b><br /><br />Mit freundlichen Grüßen<br /><br />PG-DESIGNS<form action="index.php" method="post">
		<?php } else { ?>		
		<form action="install-newsaddon.php?action=page1" method="post">
		Willkommen bei der Installation vom Newsaddon, dieses Newsaddon wurde von <a href="http://pg-designs.net">PG-DESIGNS</a> erstellt.<br />
		Wir bedanken uns für den Download.
		
		<?php } ?>
		<div id="weiter"><input type="submit" value="Weiter" /></div>
		</form>
		<div id="fix"></div>
	</div>
	<div class="title">Installation Copyright by <a href="http://pg-designs.net">PG-DESIGNS</a> | <a href="install-addons.php">Home</a></div>
</div>

</body>
</html>