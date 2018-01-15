<?php //课程课表查询
error_reporting( E_ALL&~E_NOTICE );
if(isset($_POST["submit"])) {
    $classname = $_POST["classname"];

    $conn = mysqli_connect("localhost", "root", "root"); //连接数据库
    if (!$conn) {
        die("连接失败: " . mysqli_connect_error());
    }
    mysqli_select_db($conn,"grade"); //选择数据库
    $sql = "select week, sect from schedule where classname = '$classname'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    if ($row)    //输出成绩
    {
        echo "该课程上课时间为". $row["week"]."第".$row["sect"]."节课";
    }
    else    //不存在
    {
        echo "该课程不存在";
    }
}
?>


