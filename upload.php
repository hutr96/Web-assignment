<?php //图片上传
$allowed = array("gif", "jpg", "png");// 限制上传文件格式
$f = explode(".", $_FILES["file"]["name"]);
echo $_FILES["file"]["size"];
$end = end($f);     // 获取文件后缀名
if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/png"))
    && ($_FILES["file"]["size"] < 204800)   // 小于 200 kb
    && in_array($end, $allowed))
{
    if ($_FILES["file"]["error"] > 0)
    {
        echo "错误：: " . $_FILES["file"]["error"] . "<br>";
    }
    else
    {
        echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
        echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
        echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
        // 判断当期目录下的 upload 目录是否存在该文件
        if (file_exists("image/" . $_FILES["file"]["name"]))
        {
            echo $_FILES["file"]["name"] . " 文件已经存在。 ";
            echo '<br>点击此处 <a href="activity.php">返回</a>';
        }
        else
        {
            // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
            move_uploaded_file($_FILES["file"]["tmp_name"], "image/" . $_FILES["file"]["name"]);
            echo "文件存储在: " . "image/" . $_FILES["file"]["name"];
            echo '<br>点击此处 <a href="activity.php">返回</a>';
        }
    }
}
else
{
    echo "非法的文件格式";
    echo '<br>点击此处 <a href="activity.php">返回</a>';
}
?>