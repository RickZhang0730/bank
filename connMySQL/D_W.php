<?php
 include "connMySQL.php";

 $userID = $_GET['id'];
 
 //請注意，這邊因為 $userID 本身是 integer，所以可以不用加 ''
 $sql_getDataQuery = "SELECT * FROM Customers WHERE cID = $userID";

 $result = mysqli_query($db_link, $sql_getDataQuery);

 $row_result = mysqli_fetch_assoc($result);
 $id = $row_result['cID'];
 $name = $row_result['cName'];
 $account = $row_result['cUName'];
 $balance = $row_result['cBalance'];
?>

 <?php
 if (isset($_POST["action"]) && $_POST["action"] == 'update') {

     $newBalance = $_POST['cBalance'];

     $sql_query = "UPDATE Customers SET cBalance = '$newBalance'+ $balance WHERE cID = $userID";

     mysqli_query($db_link,$sql_query);
     $db_link->close();

     header('Location: index.php');
 }
 ?>

 <head>
     <meta charset="UTF-8" />
     <title>存提款</title>
 </head>
 <body>

 <body background="77.jpg">

 <form action="" method="post" name="formAdd" id="formAdd">
     
     帳號：<input type="text" name="cUName" id="cUName" value="<?php echo $account ?>"><br/> 
     姓名：<input type="text" name="cName" id="cName" value=" <?php echo $name ?>"><br/>
     餘額：<input type="int" name="cBalance" id="cBalance" value=" <?php echo $balance ?>"><br/>
     請輸入存或提款數目：<input type="int" name="cBalance" id="cBalance" value=" "><br/>
     <input type="hidden" name="action" value="update">
     <input type="submit" name="button" value="送出">
 </form>
 </body>
 </html>