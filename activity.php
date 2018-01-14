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
    <title>Activity</title>
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
                <li class="banner"><a href="grade.php">Grades</a></li>
                <li class="banner"><a href="class-schedule.php">Class Schedule</a></li>
                <li class="banner"><a class="active" href="activity.php">Activities</a></li>
                <li class="banner"><a href="self-introduction.html">Self-Introduction</a></li>
            </ul>
        </div>
    </div>
</div>

<br><br>
<!--上传文件（仅管理员权限）-->
<?php
if($_SESSION["username"]=="hutr") {
    echo '
<div>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        上传文件
        <label for="file">文件名：</label>
        <input type="file" name="file" id="file"><br>
        <input type="submit" name="submit" value="提交">
    </form>
</div>
';
}
?>

<!--展示所有图片-->
<?php
$dir = "image/";
if($d=opendir($dir)){
    while(($file=readdir($d))!==false){
        list($filesname,$f)=explode(".",$file);
        //获取文件名和扩展名
        if($f=="gif" or $f=="jpg" or $f=="png") {
            //文件过滤
            if (!is_dir('./'.$file)) {

                echo "
                    <div class='img'>
                    <a target='_blank' href='image/$file'>
                        <img src='image/$file' alt='图片文本描述' width='400' height='225'>
                    </a>
                    </div>
                    ";//输出图片数组
            }}


    }
}
?>




</body>
</html>