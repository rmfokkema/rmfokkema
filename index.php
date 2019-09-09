<?php	
	$DOCUMENT_ROOT = '/home/renfozf385/domains/rmfokkema.nl/public_html';
	
	if (isset($_POST["t"])) $t = $_POST["t"];
	if (isset($_GET["t"])) $t = $_GET["t"];
	
	if (isset($t)) {
		$f = fopen($DOCUMENT_ROOT."/text.log", "w");
		fwrite($f, $t);
		fclose($f);
		
		header('Location: /');
		exit;
	}
	
	$currentText = file_get_contents("text.log");
	$titles = array('Vet handig, G.r', 'Allerhandigst', 'Allerhandgiszt!', 'Allerhandigste!', 'Allerhandigst. Duh.', 'Allerhandigstu', 'Allerhandigs-duh.', 'Allerhandigstduh.');
	$random = array_rand($titles);
	$randomTitle = $titles[$random];
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $randomTitle ?></title>
	
	<meta name="author" content="René" />
	<meta name="description" content="<?= $currentText ?>" />
	
	<link rel="shortcut icon" href="./icons/<?= rand(1,9).".ico" ?>" />	
	<link rel="apple-touch-icon" href="./touch/<?= rand(1,9).".png" ?>" />
	<link rel="apple-touch-icon-precomposed" href="./prec.png" />

	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="apple-mobile-web-app-status-bar-style" content="default" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<link rel="apple-touch-icon" href="icon.png" />

	<link rel="stylesheet" href="style.css" />
	<script type="text/javascript">
		var textCollection = ['<?= $currentText ?>'];
	</script>
	<script type="text/javascript" src="script.js"></script>
</head>
<body onload="init()" onkeyup="checkc(event)">
	<table><tr><td valign="center">

	<p id="main" contenteditable autocomplete="off" autocorrect="off" spellcheck="false" onkeydown="checkr(event)" onblur="dong()"></p>
	
	</td></tr></table>
<input id="out" type="text" style="visibility: hidden" />
</body>
</html>

