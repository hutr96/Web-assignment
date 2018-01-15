<?php
//登录
if(isset($_POST["submit"]))
{
    $user = $_POST["username"];
    $pwd = $_POST["password"];

    if($user == "" || $pwd == "")   //检测是否为空
    {
        echo "<script>alert('请输入用户名或密码！'); history.go(-1);</script>";
    }
    else
    {   //创建连接
        $conn = mysqli_connect("localhost","root","root");
        if (!$conn) {
            die("连接失败: " . mysqli_connect_error());
        }

        mysqli_select_db($conn,"login");
        $sql = "select username from admin where username = '$user' and password = '$pwd' 
UNION ALL select username from guest where username = '$user' and password = '$pwd'";
        //检测用户名和密码
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) > 0){
            //匹配成功
            session_start();
            $_SESSION["username"] = $user;
            echo $user,' welcome<br />';
            echo '<a href="index.php">返回主界面</a>';
            echo '点击此处 <a href="logout.php?action=logout">注销</a> 登录！<br />';
            exit;
        }
        else{
            echo '错误<br />';
            echo '<a href="index.php">返回主界面</a>';
        }

        mysqli_close($conn);

    }
}

else
{
    echo "<script>alert('提交未成功！'); history.go(-1);</script>";
}

?>