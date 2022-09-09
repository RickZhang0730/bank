<br><font size ='6' color ='red'>
<?php

$db_host = '127.0.0.1';
$db_userName = 'root';
$db_password = '40666888'; //請輸入你自己的密碼
$db_name = 'bank';

$db_link = @mysqli_connect($db_host, $db_userName, $db_password, $db_name);
if (!$db_link) {
    die('資料庫連結失敗!');
} else {
   echo '資料庫連結成功';
}

mysqli_query($db_link, "SET NAMES 'utf8'");  //設定資料庫編碼 utf8

?>

</font>
<body background="77.jpg">