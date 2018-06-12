<?php
$symb = "AaBdCcDdEeFfGgKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789"; //алфавит
$sl = substr(str_shuffle($symb), 0, 3); //последняя часть короткой ссылки
$newurl = "http://alnd.uv042.com:8080/shorten/"; //текущий адрес хоста
$url = $_POST['url'];
if ($_POST['submit']) {
echo "<br><a href='$newurl$sl' target='_blank'>$newurl$sl</a>"; //выводим короткую ссылку
$fh = fopen(".htaccess", "a"); //открыть .htaccess для записи
fwrite($fh, "
RewriteRule ^$sl$ $url"); //записать правило редиректа
fclose($fh);
}
?>
