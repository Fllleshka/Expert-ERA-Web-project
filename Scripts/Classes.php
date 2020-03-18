<?php
class ConnectionToDataBase
{
	private $host;
	private $port;
	private $dbname;
	private $user;
	private $pass;
	private $conn;
	private $querty;
	private $connectionstring;
	private $result;
	private $statusconn;

	// Конструктор класса
	function __construct($host,$port,$dbname,$user,$pass)
	{
		$this -> host =  $host;
		$this -> port = $port;
		$this -> dbname = $dbname;
		$this -> user = $user;
		$this -> pass = $pass;
		$this -> connectionstring = "host=".$this->host." port=".$this->port." dbname=".$this->dbname." user=".$this->user." password=".$this->password;
	}

	// Функция для выполнения запроса к серверу
	function Connect($query)
	{
		// Принимаем строку запроса для отправки его в БД
		$this -> query = $query;
		// Тут должно быть соединение с Базой данных!
		$this -> conn = pg_pconnect($this -> connectionstring) or die('Не удалось соединиться: ' . pg_last_error());
        // Выполняем запрос
		$this -> result = pg_query($this -> conn, $this -> query);
		// Возвращаем результат
		return $this -> result;
	}

	// Функция вывода статистки подключения
	function ConnectionInfo()
	{
		echo "Ip хоста: $this->host <br/>";
		echo "Порт: $this->port <br/>";
		echo "Название БД: $this->dbname <br/>";
		echo "Логин полльзователя: $this->user <br/>";
		echo "Пароль: $this->pass <br/>";
		echo "STR: $this->str <br/>";
		echo "Строка подключения: $this->connectionstring";
	}

	// Деструктор класса
	function __destruct(){}
}

class Property_table
{
	private $label;
	private $result;
	private $conn;

	function __construct ($label)
	{
		$this -> label = $label;
	}

	// Функция вывода обычной строковой переменной
	function getSTR($text, $date, $name_table)
	{
		$this -> text = $text;
		$this -> date = $date;
		$this -> name_table = $name_table;
		echo "<tr><th></th><th><h2>$this->label</h2></th><th><input type='text' size='40' value = '$this->text'></th></tr>";
	}

	function getSTRarea($text)
	{
		$this -> text = $text;
		echo "<tr><th></th><th><h2>$this->label</h2></th><th><textarea rows = 10 cols='47' resize: none;>$this->text</textarea></th></tr>";
	}

	// Функция вывода переменной типа date
	function getSTRDate($date)
	{
		// Принимаем строку запроса для отправки его в БД
		$this -> date = $date;
		echo "<tr><th></th><th><h2>$this->label</h2></th><th><input type='date' id='date' sise = '40' value = $date></th></tr>";
	}
	function __destruct(){}
}
?>
