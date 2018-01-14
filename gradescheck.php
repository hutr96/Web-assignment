<?php
error_reporting( E_ALL&~E_NOTICE );
if(isset($_POST["submit"])) {
    $class = $_POST["classname"];

    $conn = mysqli_connect("localhost", "root", "root"); //连接数据库
    if (!$conn) {
        die("连接失败: " . mysqli_connect_error());
    }
    mysqli_select_db($conn,"grade"); //选择数据库
    $sql = "select class, grade from grade1 where class = '$class'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row)    //输出成绩
    {
        echo "成绩为". $row["grade"];
    }
    else    //不存在
    {
        echo "该课程不存在";
    }
}
?>