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
    <title>Class-Schedule</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>

<!--导航栏-->
<div>
    <div class="container">

        <div>
            <ul class="banner" >
                <li style="float:left" class="banner"><a  href="index.php">Home</a></li>
                <li class="banner"><a href="CV.pdf">CV</a></li>
                <li class="banner"><a href="grade.php">Grades</a></li>
                <li class="banner"><a class="active" href="class-schedule.php">Class Schedule</a></li>
                <li class="banner"><a href="activity.php">Activities</a></li>
                <li class="banner"><a href="self-introduction.html">Self-Introduction</a></li>
            </ul>
        </div>

    </div>
</div>

<br><br>
<?php
$mon=array();
$tue=array();
$wes=array();
$thu=array();
$fri=array();
$conn = mysqli_connect("localhost", "root", "root"); //连接数据库
if (!$conn) {
    die("连接失败: " . mysqli_connect_error());
}
mysqli_select_db($conn,"grade"); //选择数据库
$sql = "select week,sect,classname from schedule";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // 输出成绩
    while($row = mysqli_fetch_assoc($result)) {
//        echo "week: " . $row["week"]. "   -- sect: " . $row["sect"]."  -- classname ".$row["classname"]. "<br>";
        //读取课表并分配，准备输出至表格
        if($row["week"]=="mon"){
            $mon[$row["sect"]-1]=$row["classname"];
        }
        if($row["week"]=="tue"){
            $tue[$row["sect"]-1]=$row["classname"];
        }
        if($row["week"]=="wes"){
            $wes[$row["sect"]-1]=$row["classname"];
        }
        if($row["week"]=="thu"){
            $thu[$row["sect"]-1]=$row["classname"];
        }
        if($row["week"]=="fri"){
            $fri[$row["sect"]-1]=$row["classname"];
        }
    }
}

?>
<!--课表表格-->
<h4>课程表:</h4>

<table id='schedule'>
    <tr>
        <th> </th>
        <th>周一</th>
        <th>周二</th>
        <th>周三</th>
        <th>周四</th>
        <th>周五</th>
    </tr>
    <tr>
        <th>8:00-9:50</th>
        <td align='center'><div><?php echo $mon[0]; ?></div></td>
        <td align='center'><div><?php echo $tue[0]; ?></div></td>
        <td align='center'><div><?php echo $wes[0]; ?></div></td>
        <td align='center'><div><?php echo $thu[0]; ?></div></td>
        <td align='center'><div><?php echo $fri[0]; ?></div></td>
    </tr>
    <tr  class='alt'>
        <th>10:10-12:00</th>
        <td align='center'><div><?php echo $mon[1]; ?></div></td>
        <td align='center'><div><?php echo $tue[1]; ?></div></td>
        <td align='center'><div><?php echo $wes[1]; ?></div></td>
        <td align='center'><div><?php echo $thu[1]; ?></div></td>
        <td align='center'><div><?php echo $fri[1]; ?></div></td>
    </tr>
    <tr>
        <th>13:30-15:20</th>
        <td align='center'><div><?php echo $mon[2]; ?></div></td>
        <td align='center'><div><?php echo $tue[2]; ?></div></td>
        <td align='center'><div><?php echo $wes[2]; ?></div></td>
        <td align='center'><div><?php echo $thu[2]; ?></div></td>
        <td align='center'><div><?php echo $fri[2]; ?></div></td>
    </tr>
    <tr class='alt'>
        <th>15:30-17:20</th>
        <td align='center'><div><?php echo $mon[3]; ?></div></td>
        <td align='center'><div><?php echo $tue[3]; ?></div></td>
        <td align='center'><div><?php echo $wes[3]; ?></div></td>
        <td align='center'><div><?php echo $thu[3]; ?></div></td>
        <td align='center'><div><?php echo $fri[3]; ?></div></td>
    </tr>
</table>

<?php //课表查询
if($_SESSION["username"]) {
    echo '
<br>
<div class="container">
    <form action="schedulecheck.php" method="post">
        查询课程时间：输入课程名称<br>
        <input type="text" name="classname"><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
';
}
?>


<?php
if($_SESSION["username"]=="hutr") {
    echo '
<div class="container">
    <form action="insertclass.php" method="post">
        输入<br>
        课程周次<input type="text" name="week">(mon,tue,wes,thu,fri)<br>
        课程节次<input type="text" name="section">(1,2,3,4)<br>
        课程名称<input type="text" name="name"><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
';
}
?>

</body>
</html>