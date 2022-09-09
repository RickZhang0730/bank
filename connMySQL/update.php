<?php
 include "connMySQL.php";

 $userID = $_GET['id'];
 
 //請注意，這邊因為 $userID 本身是 integer，所以可以不用加 ''
 $sql_getDataQuery = "SELECT * FROM Customers WHERE cID = $userID";

 $result = mysqli_query($db_link, $sql_getDataQuery);

 $row_result = mysqli_fetch_assoc($result);
 $id = $row_result['cID'];
 $name = $row_result['cName'];
 $birthday = $row_result['cBirthday'];
 $address = $row_result['cAddress'];
 $account = $row_result['cUName'];
 $phone = $row_result['cPhone'];
?>

 <?php
 if (isset($_POST["action"]) && $_POST["action"] == 'update') {

     $newName = $_POST['cName'];
     $newBirthday = $_POST['cBirthday'];
     $newAddress = $_POST['cAddress'];
     $newAccount = $_POST['cUName'];
     $newPhone = $_POST['cPhone'];

     $sql_query = "UPDATE Customers SET cName = '$newName', cBirthday = '$newBirthday', cAddress = '$newAddress', cUName = '$newAccount', cPhone = '$newPhone' WHERE cID = $userID";

     mysqli_query($db_link,$sql_query);
     $db_link->close();

     header('Location: index.php');
 }
 ?>

 <html>

 <head>
     <meta charset="UTF-8" />
     <title>修改會員資料</title>
 </head>
 <body>

 <body background="77.jpg">

 <form action="" method="post" name="formAdd" id="formAdd">
      
     請輸入姓名：<input type="text" name="cName" id="cName" value=" <?php echo $name ?>"><br/>
     請輸入生日：<input type="date" name="cBirthday" id="cBirthday" value="<?php echo $birthday ?>"><br/>
     請輸入地址：<input type="text" name="cAddress" id="cAddress" value="<?php echo $address ?>"><br/>
     請輸入帳號：<input type="text" name="cUName" id="cUName" value="<?php echo $account ?>"><br/>
     請輸入電話：<input type="phone" name="cPhone" id="cPhone" value="<?php echo $phone ?>"><br/>
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="修改資料">
 </form>
 </body>
 </html>