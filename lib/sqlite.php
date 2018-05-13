<?php
/*
Создание БД с пользовательским именем,
таблицей 'users' и стоблцами 'github_id' и 'github_login'
*/

function create_database($db_name){
    $db = new SQLite3($db_name);

    if ($db->exec("CREATE TABLE users (
        github_id    INT (11)      PRIMARY KEY
                                NOT NULL,
        github_login VARCHAR (255) NOT NULL
    );")) echo "DB '$db_name' and Table users were made\n";

    $db->close();
}