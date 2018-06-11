<?php
$symb = "AaBdCcDdEeFfGgKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz0123456789"; //алфавит
$sl = substr(str_shuffle($symb), 0, 3); //последняя часть короткой ссылки
$newurl = "http://localhost/shorten/"; //начало короткой ссылки
$url = $_POST['url'];
if ($_POST['submit']) {
echo "<br><a href='$newurl$sl' target='_blank'>$newurl$sl</a>"; //выводим короткую ссылку
$f = fopen("href/$sl.php", "w"); //создать файл с именем короткой ссылки
fwrite($f, "<?php header('Location: $url') ?>"); //записать юрл для редиректа
fclose($f);
$fh = fopen(".htaccess", "a"); //открыть .htaccess для записи
fwrite($fh, "
RewriteRule ^$sl$ http://localhost/shorten/href/$sl.php"); //записать правило редиректа
fclose($fh);
}
?>
