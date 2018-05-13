<?php
    include_once('lib/curl_query.php');
    include_once('lib/sqlite.php');

    
// Посылаем запрос и получаем данные из сети  
    $url = 'https://api.github.com/users';
    $html = curl_get($url);

    
// Можно сохранять полученные данные в файл и потом парсить файл
//    file_put_contents('users.json', $html);
//    $jsondata = file_get_contents('users.json');
 
 
// Я сделал напрямую, без файла
    $json = json_decode($html,true);

    
// Запрашиваем у пользователя имя БД, в которую будем записывать данные
    $a = readline("Please write down DB name: ");      
    $filename = $a.'.db';
 
 
/*
Проверяем существует ли такая БД, и если "нет",
то создаём её и таблицу 'users' с необходимыми столбцами
*/
    if (file_exists($filename)) {
        echo "DB $filename already exists\n";
    } else {
        create_database($filename);
        }   
        
        
// Подключаемся к БД
    $db = new SQLite3($filename);

    
// Записываем данные в неё    
    foreach ($json as $value){
        $id = $value['id'];
        $login = $value['login'];
        echo $value['id'].": ".$value['login']."\n";
        $db->exec("INSERT OR REPLACE INTO users VALUES ('$id','$login')");
    }
    echo "Collected data was successfully inserted into DB!";
