<!DOCTYPE html>
<html>
<head>
	<title>Expert ERA</title>
<!-- Подключение библиотеки jquery для работы -->
<script src="Scripts/JS/jquery-latest.js"></script>

<script>
// Скрипт для вывода списка НИРов
function getnameporject(){
    var nameproject = $('#nameproject').val();
    $.ajax( {
        type: "POST",
        url: "Scripts/JS/getnameporject.php",
        dataType: 'JSON',
        success:    function (data){
                    let i = 0;
                    do{
                        let option = "#option" + i;
                        $(option).text(data[i]);
                        i++;
                    } while (i < data['length']);
                    }
            });
}

// Скрипт для вывода списка НИРов -->
function projectname(selectobject){
    
    var value = selectobject.value;
    if (value == "Выберите Шифр НИРа"){
        document.getElementById("Name_NIR").innerHTML = "<h3>Необходимо выбрать НИР!" + "</h3>";
    }
    else{
    document.getElementById("Name_NIR").innerHTML = "<h3>Выбран НИР: " + value + "</h3>";
    
    // Запускаем фаил скрипта, который выведет нам данные
    $.ajax( {
    type: "POST",
    url: "functions/output.php",
    datatype: "html",
    data: {value},
    // Как передать переменную VALUE в ouput.php?
    success: function(data){
            document.getElementById("Dates_NIR").innerHTML = data;
            //console.log ("Я второй AJAX и я отработал!");
            },
    error: function(){
            //console.log ("Я второй AJAX и я сломался!");
            }
        });
        
    }
}


</script>
</head>
<body onload="getnameporject()">
<?php
// Включение фаилов
include "Scripts/DataBaseDate.php";
include "Scripts/Dates.php";
include "Scripts/Classes.php";
// Включаем HEADER
include_once "bloks/header.html";

// Вызываем класс работы с базой данных
$checkconnection = new ConnectionToDataBase($host,$port,$dbname,$user,$pass);
// Выводим информацию о подключении
//$checkconnection -> ConnectionInfo();
?>
<table>
<tr>
	<th>
        <!-- Выпадающее окно для выбора НИРа -->
        <select style = "width: 300px;" onchange = "projectname(this); selectinforopject(this)">
            <option>Выберите Шифр НИРа</option>
            <?php
            for ($i = 0; $i < 2 ; $i++){
                $option = "option".$i;
                echo "<option id='".$option."'></option>";
            }
            ?>
        </select>
    
        <!-- Блок для вывода выбранного НИРа -->
        <div id = "Name_NIR" align="left"></div>
	</th>
    <th width="40%">
    </th>
    <th width="30%">
        <button onclick = "updateinfoproject()">Сохранить изменения</button>
    </th>

</tr>
</table>
<table width="100%">
    <tr>
        <th width="30%">
        </th>
        <th width="40%">
            <div id = "Dates_NIR" align="left"></div>
        </th>
    </tr>
</table>
</body>
</html> 
