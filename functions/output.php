<?php
$name_NIR  = $_POST['value'];
include "../Scripts/DataBaseDate.php";
include "../Scripts/Classes.php";
include "../Scripts/Dates.php";
    // Вызываем класс работы с базой данных
    $checkconnection = new ConnectionToDataBase($host,$port,$dbname,$user,$pass);
	// Строка запроса к базе данных
	$str = "SELECT id_expertise
			FROM preliminary_examination_account 
			WHERE project_codename = '".$name_NIR. "';";
	$result_str = $checkconnection -> Connect($str);
	// Выяснение id проекта в системе
	$row = pg_fetch_row($result_str);
	$id_project = $row[0];
	foreach($array as $myarr)
	{
		$lineoftable = new Property_table($myarr);
		switch ($myarr){
			case "Дата регистрации проекта:":
				$date = $arraynames[1];
				$name_table = $arraytables[1];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$date_project =  $row[0];
				$lineoftable -> getSTRDate($date_project);
				break;

			case "Заявитель:":
				$date = $arraynames[2];
				$name_table = $arraytables[1];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text=  $row[0];
				$lineoftable -> getSTR($text);
				break;

			case "Краткое описание:":
				$date = $arraynames[3];
				$name_table = $arraytables[1];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTRarea($text_project);
				break;

			case "Результат предварительной экспертизы:":
				$date = $arraynames[4];
				$name_table = $arraytables[1];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				if($text_project == TRUE)
					$text_project = "Положительный";
				else
					$text_project = "Отрицательный";
				$lineoftable -> getSTR($text_project);
				break;

			case "Количество экспертов:":
				$date = $arraynames[5];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTR($text_project);
				break;

			case "Дата исходящего документа:":
				$date = $arraynames[6];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$date_project =  $row[0];
				$lineoftable -> getSTRDate($date_project);
				break;

			case "Номер исходящего документа:":
				$date = $arraynames[7];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTR($text_project);
				break;

			case "Вид организации:":
				$date = $arraynames[8];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				if($text_project == TRUE)
					$text_project = "Ведомственная";
				else
					$text_project = "Вневедомственная";
				$lineoftable -> getSTR($text_project);
				break;

			case "Наименование организации:":
				$date = $arraynames[9];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTR($text_project);
				break;

			case "Эксперт:":
				$str = "SELECT surname, name, second_name
						FROM roster_of_experts, preliminary_examination_account
						WHERE roster_of_experts.id_expert = preliminary_examination_account.id_expert;";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0]." ".$row[1]. " ". $row[2];
				$lineoftable -> getSTR($text_project);
				break;

			case "Дата исходящего документа от эксперта:":
				$date = $arraynames[11];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$date_project =  $row[0];
				$lineoftable -> getSTRDate($date_project);
				break;

			case "Дата входящего документа:":
				$date = $arraynames[12];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$date_project =  $row[0];
				$lineoftable -> getSTRDate($date_project);
				break;

			case "Номер входящего документа:":
				$date = $arraynames[13];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTR($text_project);
				break;

			case "Результат экспертизы:":
				$str = "SELECT name_expert_result
						FROM preliminary_examination_account, possible_examination_results WHERE preliminary_examination_account.id_expert_result = possible_examination_results.id_expert_result;";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTR($text_project);
				break;

			case "Оценка труда эксперта:":
				$str = "SELECT assessment
						FROM preliminary_examination_account, assessment_of_labor_expert
						WHERE preliminary_examination_account.id_expert_result = assessment_of_labor_expert.id_ass_of_lab_expert;";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				if ($text_project = 3)
					$text_project = "Удовлетворительно";
				else if ($text_project = 4)
					$text_project = "Хорошо";
				else if ($text_project = 5)
					$text_project = "Отлично";
				$lineoftable -> getSTR($text_project);
				break;
			
			case "Результат:":
				$date = $arraynames[16];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTRarea($text_project);
				break;

			case "Отвественное лицо:":
				$str = "SELECT surname, name, second_name
						FROM preliminary_examination_account, responsible_of_the_project
						WHERE preliminary_examination_account.id_resp_exam_report = responsible_of_the_project.id_resp_exam_report;";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[2]." ".$row[0]. " ". $row[1];
				$lineoftable -> getSTR($text_project);
				break;

			case "Дата отчёта о проведении экспертизы:":
				$date = $arraynames[18];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTRDate($text_project);
				break;

			case "Дата исходящего документа отчёта:":
				$date = $arraynames[19];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$date_project =  $row[0];
				$lineoftable -> getSTRDate($date_project);
				break;

			case "Номер исходящего документа отчёта:":
				$date = $arraynames[20];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTR($text_project);
				break;

			case "Примечание:":
				$date = $arraynames[21];
				$name_table = $arraytables[2];
				$str = "SELECT ".$date."
						FROM ".$name_table."
						WHERE id_expertise = '".$id_project. "';";
				$result_str = $checkconnection -> Connect($str);
				$row = pg_fetch_row($result_str);
				$text_project =  $row[0];
				$lineoftable -> getSTRarea($text_project);
				break;
		}
	}  
?>
