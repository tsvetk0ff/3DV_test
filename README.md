# 3DV_test
Скрипт посылает запрос на страницу https://api.github.com/users, парсит с неё данные (id и login пользователей) и записывает их в БД. Имя БД, в которую будут записаны даные, указывает пользователь.<br>
<h2>Что необходимо для корректной работы</h2>
Для корректной работы необходимо, чтобы в файле php.ini были раскомментированы следующие расширения<br>
* curl
* sqlite3

<h2>Запуск</h2>
1. В папке со скриптом запустить командную строку;<br>
2. Выполнить команду: `php index.php`
