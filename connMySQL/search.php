<?php
    include("connMySQL.php");
    $sql_query = "SELECT * FROM Customers ORDER BY cID ASC";
    $result = mysqli_query($db_link,$sql_query);
    $total_records = mysqli_num_rows($result);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>會員資料</title>

</head>
<body>
<body background="77.jpg">
<font size ='6'>
<h1 align = "center">餘額</h1>
<p align= "center">單位（元）</p>
</font>

<table border="1" align = "center">
    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>餘額</th>
    </tr>

<?php

while($row_result = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$row_result['cID']."</td>";
    echo "<td>".$row_result['cName']."</td>";
    echo "<td>".$row_result['cBalance']."</td>";
    echo "</tr>";
}
?>

</table>
</body>
</html>