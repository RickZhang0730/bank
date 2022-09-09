<?php
//先檢查請求來源是否是我們上面創建的 form
if (isset($_POST["action"])&&($_POST["action"] == "add")) {

    //引入檔，負責連結資料庫
    include("connMySQL.php");

    //取得請求過來的資料
    $name = $_POST["cName"];
    $birthday = $_POST['cBirthday'];
    $address = $_POST['cAddress'];

    //資料表查訪指令，請注意 "" , '' 的位置
    //INSERT INTO 就是新建一筆資料進哪個表的哪個欄位
    $sql_query = "INSERT INTO Customers (cName, cBirthday, cAddress) VALUES ('$name', '$birthday','$address')";

    //對資料庫執行查訪的動作
    mysqli_query($db_link,$sql_query);

    //導航回首頁
    header("Location: index.php");
}
?>

<html>

<head>
    <meta charset="UTF-8" />
    <title>新增會員資料</title>
</head>
<body>
<form action="" method="post" name="formAdd" id="formAdd">
請輸入姓名：<input type="text" name="cName" id="cName"><br/>
請輸入生日：<input type="date" name="cBirthday" id="cBirthday"><br/>
請輸入Address：<input type="text" name="cAddress" id="cAddress"><br/>
<input type="hidden" name="action" value="add">
<input type="submit" name="button" value="新增資料">
<input type="reset" name="button2" value="重新填寫">
</form>
</body>
</html>

