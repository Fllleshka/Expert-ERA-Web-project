<?php
include "../DataBaseDate.php";
include "../Classes.php";

// Вызываем класс работы с базой данных
$checkconnection = new ConnectionToDataBase($host,$port,$dbname,$user,$pass);

// Строка запроса к базе данных
$str = "SELECT project_codename FROM preliminary_examination_account;";

// Получаем результат запроса
$result = $checkconnection -> Connect($str);

$arr = array();
//Разбираем результат запроса в строки
while ($row = pg_fetch_row($result))
	{
		array_push($arr,$row[0]);
	}
$json_result = json_encode($arr);
echo $json_result;
?>
