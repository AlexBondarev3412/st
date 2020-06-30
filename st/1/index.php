<?php
$error = "";
	if(isset($_POST['addTask'])) {
		if (isset($_COOKIE['tasks'])) {
			foreach ($_COOKIE['tasks'] as $name => $value) {
				$t = explode(";",$value);				
				if($t[0] == strip_tags($_POST['taskValue'])) {
					$error = "Такое задание уже существует!";
					break;
				}	
			}
		}
		if ($error == "") {
			$count = 0;
			if (isset($_COOKIE['tasks'])) {
				foreach ($_COOKIE['tasks'] as $name => $value) {
					if($name >= $count) {
						$count = $name + 1;
					}
				}
			}
			setcookie("tasks[".$count."]", strip_tags($_POST['taskValue']).";0", time() + 3600);
			header("Refresh: 0");
		}
	}
	
	if(isset($_POST['delTask'])) {
		setcookie("tasks[".key($_POST['delTask'])."]", strip_tags($_POST['taskValue']).";0", time() - 3600);
		header("Refresh: 0");
	}
	
	if(isset($_POST['setTask'])) {
		$val = "";
		if (isset($_COOKIE['tasks'])) {
			foreach ($_COOKIE['tasks'] as $name => $value) {
					if($name == $_POST['Radio']) $val = explode(";",$value);
			}
		}
		if($val != "") {
			setcookie("tasks[".$_POST['Radio']."]", $val[0].";1", time() + 3600);
			header("Refresh: 0");
		}
	}
	
?>
<html lang="ru-RU">
<head>
	<meta charset="UTF-8"/>
	<link rel="stylesheet" type="text/css" href="css.css" />
	<title>Task list</title>
</head>
<body>
	<form method="POST">
		<div class="block">
			<input type="text" id="taskValue" name="taskValue"><br/>
			<input type="submit" name="addTask" value="Добавить">
			<input type="reset" value="Очистить">
			<input type="submit" name="setTask" value="Отметить как выполненное"></br>
<?php
echo $error;
?>
		</div>
		<div class="block">
			<p>Лист заданий<p>
			<table>
<?php
	if (isset($_COOKIE['tasks'])) {
		foreach ($_COOKIE['tasks'] as $name => $value) {
			$t = explode(";", $value);
			echo "<tr>
				<td>".($t[1] == 1 ? "<font color=\"green\">✓</font>" : "")."<input type=\"radio\" name=\"Radio\" value=\"".$name."\"><label>".$t[0]."</label></input></td>
				<td><input type=\"submit\" name=\"delTask[".$name."]\" value=\"Удалить\"></td>
			</tr>";
		}
	}
?>
			</table>
		<div>
	</form>
</body>
</html>