<?php
$conn = mysqli_connect("localhost","root","root");
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
$sql = "CREATE DATABASE login";
if (mysqli_query($conn, $sql)) {
    echo "数据库创建成功";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

mysqli_close($conn);
?>