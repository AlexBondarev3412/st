<?php
	include 'control.php';
	$mig = new Mig("МИГ");
	$ty154 = new Ty154("ТУ-154");
?>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="css.css" />
	<title>Управление самолётами</title>
</head>
<body>
	<form method="POST">
		<div class="block">
			<input type="submit" name="migUp" value="МИГ взлёт">
			<input type="submit" name="migDown" value="МИГ посадка">
			<input type="submit" name="migAttack" value="МИГ атака"></br>
			<input type="submit" name="tyUp" value="ТУ-154 взлёт">
			<input type="submit" name="tyDown" value="ТУ-154 посадка">
			</br>
<?php
echo $error;
if(isset($_POST['migUp'])) 	$mig->Up();
if(isset($_POST['migDown'])) $mig->Down();
if(isset($_POST['migAttack'])) $mig->Attack();
if(isset($_POST['tyUp'])) $ty154->Up();
if(isset($_POST['tyDown']))	$ty154->Down();
?>
		</div>
	</form>
</body>
</html>