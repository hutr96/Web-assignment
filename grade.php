<?php
error_reporting( E_ALL&~E_NOTICE );
session_start();
//验证登录
if(!isset($_SESSION["username"])){
    echo '<br>';
    echo 'Please Login';
    echo '<a href="index.php">返回主界面</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grades</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>


<body>
<!--导航栏-->
<div>
    <div class="container">
        <div>
            <ul class="banner" >
                <li style="float:left" class="banner"><a href="index.php">Home</a></li>
                <li class="banner"><a href="CV.pdf">CV</a></li>
                <li class="banner"><a class="active" href="grade.php">Grades</a></li>
                <li class="banner"><a href="class-schedule.php">Class Schedule</a></li>
                <li class="banner"><a href="activity.php">Activities</a></li>
                <li class="banner"><a href="self-introduction.html">Self-Introduction</a></li>
            </ul>
        </div>
    </div>
</div>
<br><br><br>
<?php

// 创建连接
$conn = mysqli_connect("localhost", "root", "root");
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
mysqli_select_db($conn,"grade");
$sql = "select class, grade from grade1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // 输出成绩
    while($row = mysqli_fetch_assoc($result)) {
        echo "ClassName: " . $row["class"]. "   -- grade: " . $row["grade"]. "<br>";
    }
} else {
    echo "nothing there";
}

mysqli_close($conn);
?>

<?php //成绩查询
if($_SESSION["username"]) {
    echo '
<br>
<div class="container">
    <form action="gradescheck.php" method="post">
        查询成绩：输入课程名称<br>
        <input type="text" name="classname"><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
';
}
?>

<?php //成绩录入
if($_SESSION["username"]=="hutr") {
    echo '
<br>
<div class="container">
    <form action="insertgrades.php" method="post">
        输入成绩<br>
        <input type="text" name="classname"><br>
        <input type="text" name="grade"><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
';
}
?>

</body>
</html>
