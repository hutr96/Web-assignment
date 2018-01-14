<?php

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $sex = $_POST["sex"];
    $major = $_POST["major"];
    $address = $_POST["address"];
    $zipcode = $_POST["zipcode"];
    $email = $_POST["email"];
    $telephone = $_POST["telephone"];


    $conn = mysqli_connect("localhost", "root", "root");   //连接数据库
    mysqli_select_db($conn,"login"); //选择数据库
    $sql = "select username from guest where username = '$username'";
    $result = mysqli_query($sql);
    $num = mysqli_num_rows($result);
    if ($num)    //如果存在该用户名则警告
    {
        echo "<script>alert('username existed'); history.go(-1);</script>";
    }
    else    //不存在则注册
    {
        $sql_insert = "insert into guest (username,password,firstname,lastname,sex,major,address,zipcode,email,telephone) 
values('$_POST[username]','$_POST[password]','$_POST[firstname]','$_POST[lastname]','$_POST[sex]','$_POST[major]','$_POST[address]','$_POST[zipcode]','$_POST[email]','$_POST[telephone]')";
        $insert = mysqli_query($sql_insert);
        if ($insert) {
            echo '<br><a href="index.php">注册成功，返回主界面</a>';
        }
        else {
            echo '<br><a href="index.php">错误，返回主界面</a>';
        }
    }
}
?>