<?php

if(isset($_POST["submit"])) {
    $week = $_POST["week"];
    $sect = $_POST["section"];
    $classname = $_POST["name"];

    $conn = mysqli_connect("localhost", "root", "root"); //连接数据库
    if (!$conn) {
        die("连接失败: " . mysqli_connect_error());
    }
    mysqli_select_db($conn,"grade"); //选择数据库
    $sql = "select week,sect from schedule where week ='$week' and sect = '$sect'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0)    //如果存在该课程则警告
    {
        echo "<script>alert('class already existed at that time'); history.go(-1);</script>";
    }
    else    //不存在则输入成绩
    {
        $sql_insert = "insert into schedule(week,sect,classname) values('$week','$sect','$classname')";
        $insert = mysqli_query($conn, $sql_insert);

        if ($insert) {
            echo "<script>alert('succeed'); history.go(-1);</script>";
        }
        else {
            echo "<script>alert('error'); history.go(-1);</script>";
        }
    }
}
?>