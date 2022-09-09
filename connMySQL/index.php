<?php
    include("connMySQL.php");
    $sql_query = "SELECT * FROM Customers ORDER BY cID ASC";
    $result = mysqli_query($db_link,$sql_query);
    $total_records = mysqli_num_rows($result);
?>

<?php
if (! (empty($_POST['cUName']) || empty($_POST['cPassword']) || empty($_POST['cName']) || empty($_POST['cPhone'])|| empty($_POST['cBirthday'])||empty($_POST['cAddress']))) {
    include('connectMySQL.php');

    $username = $_POST['cUName'];
    $password = password_hash($_POST['cPassword'], PASSWORD_DEFAULT);
    $name = $_POST['cName'];
    $phone = $_POST['cPhone'];
    $birth = $_POST['cBirthday'];
    $address = $_POST['cAddress'];

    $sql_query = "INSERT INTO Customers (cUName, cPassword, cName, cPhone, cBirthday, cAddress) VALUES ('$username', '$password', '$name', '$phone', '$birth', '$address')";

    mysqli_query($db_link, $sql_query);

    $sql_findID = "SELECT * FROM Customers WHERE cUName = '".$_POST['cUNname']."'";

    $data = mysqli_query($db_link, $sql_findID);
    $user = mysqli_fetch_assoc($data);
    session_start();
    $_SESSION['cID'] = $user['cID'];
    $_SESSION['cUName'] = $user['cUName'];
    $_SESSION['cPassword'] = $user['cPassword'];
    $_SESSION['cName'] = $user['cName'];
    $_SESSION['cPhone'] = $user['cPhone'];
    $_SESSION['cBirthday'] = $user['cBirthday'];
    $_SESSION['cAddress'] = $user['cAddress'];


    header('Location: index.php');
}
?>



<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700,500,900' rel='stylesheet' type='text/css'>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="js/skel.min.js"></script>
    <script src="js/skel-panels.min.js"></script>
    <script src="js/init.js"></script>
    <noscript>
        <link rel="stylesheet" href="css/skel-noscript.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="stylesheet" href="css/style-desktop.css" />
    </noscript>
    <meta charset="UTF-8">
    <title>會員資料</title>
</head>
<body>


<div class="container">

    <!-- Logo -->
    <div id="logo">
        <h1><a href="#">Love Bank</a></h1>
        <span class="tag">一碗滷肉飯 一瓶礦泉水</span>
    </div>
</div>
</div>
<!-- Header -->

<!-- Tweet -->
<div id="tweet">
    <div class="container">
        <section>
            <blockquote>&ldquo;你怕不怕麻煩啊?<br>
                幹什麼?<br>

                你要是不怕的話，麻煩你喜歡一下我。
                &rdquo;</blockquote>
        </section>
    </div>
</div>
<!-- /Tweet -->

<div style="width:100%;text-align:center">
    <form id="update" name="update" method="post" action="">
        <table width="500" border="0" align="center" cellpadding="5" cellspacing="0" bgcolor="#F2F2F2">
            <tr>
                <div class="content">
                    <td colspan="2" align="center" bgcolor="#CCCCCC"><font color="#000000">會員資料</font></td>
            </tr>
            <tr>
                <td width="160" align="center" valign="baseline">帳號</td>
                <td valign="baseline">
                    <input type="text" name="cUName" id="cUName" value=""></td>
            </tr>
            <tr>
                <td width="80" align="center" valign="baseline">密碼</td>
                <td valign="baseline">
                    <input type="text" name="cPassword" id="cPassword" value=""></td>
            </tr>
            <tr>
                <td width="80" align="center" valign="baseline">名字</td>
                <td valign="baseline">
                    <input type="name" name="cName" id="cName" value=""></td>
            </tr>
            <tr>
                <td width="80" align="center" valign="baseline">電話</td>
                <td valign="baseline">
                    <input type="phone" name="cPhone" id="cPhone"></td>
            </tr>
            <tr>
                <td width="80" align="center" valign="baseline">地址</td>
                <td valign="baseline">
                    <input type="text" name="cAddress" id="cAddress"></td>
            </tr>
            <tr>
                <td width="80" align="center" valign="baseline">生日</td>
                <td valign="baseline">
                    <input type="date" name="cBirthday" id="cBirthday"></td>
            </tr>
            <tr>
                <td colspan="2" align="center" bgcolor="#CCCCCC">
                    <input type="hidden" name="action" value="store">
                    <input type="submit" name="button" id="button" value="註冊"></td>
                <!--                            <input type="reset" name="button2" id="button2" value="重設" ></td>-->
            </tr>
        </table>
    </form>
</div>

<font color="red" size="6"><h1 align = "center">會員資料總表</h1><br>
    <p align= "center">目前資料筆數：<?php echo $total_records;?></p></font>


<table border="1" align = "center">

    <tr>
        <th>ID</th>
        <th>姓名</th>
        <th>帳號</th>
        <th>生日</th>
        <th>地址</th>
        <th>電話</th>
        <th>編輯</th>
    </tr>

    <?php

    while($row_result = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row_result['cID']."</td>";
        echo "<td>".$row_result['cName']."</td>";
        echo "<td>".$row_result['cUName']."</td>";
        echo "<td>".$row_result['cBirthday']."</td>";
        echo "<td>".$row_result['cAddress']."</td>";
        echo "<td>".$row_result['cPhone']."</td>";
        echo "<td><a href='update.php?id=".$row_result['cID']."'>修改</a> ";
        echo "<td><a href='D_W.php?id=".$row_result['cID']."'>存提款(查詢餘額)</a> ";
        echo "<a href='delete.php?id=".$row_result['cID']."'>刪除</a></td>";
        echo "</tr>";
    }
    ?>

</table>



<!-- Footer -->
<div id="footer">
    <div class="container">
        <section>
            <header>
                <h2>持續的使用我們>< Get in touch
                    讓我們的愛，永不斷線</h2>
                <span class="byline">2020非韓不投</span>
            </header>
            <ul class="contact">
                <li><a href="https://jable.tv/" class="fa fa-twitter"><span>Twitter</span></a></li>
                <li class="active"><a href="https://jable.tv/" class="fa fa-facebook"><span>Facebook</span></a></li>
                <li><a href="https://jable.tv/" class="fa fa-dribbble"><span>Pinterest</span></a></li>
                <li><a href="https://jable.tv/" class="fa fa-tumblr"><span>Google+</span></a></li>
            </ul>
        </section>
    </div>
</div>
<!-- /Footer -->

<!-- Copyright -->
<div id="copyright">
    <div class="container">
        Design: <a href="http://templated.co">TEMPLATED</a> Images: <a href="http://unsplash.com">Unsplash</a> (<a href="http://unsplash.com/cc0">CC0</a>)
    </div>
</div>





</body>
</html>
