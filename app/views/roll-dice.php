<html>
<head>
	<title></title>
</head>
<body>
	<h3>the die rolled a <?= $rando; ?></h3>
	<h3>you guessed <?= $guess; ?></h3>
	<? if($rando == $guess) { ?>
		<h3>you win, you magnificent bastardo!</h3>
	<? } else { ?>
		<h3>try again!</h3>
	<? } ?>
</body>
</html>