<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<!--head-->

<head>
    <meta charset="UTF-8">
    <title>HU Tianrui</title>

    <link rel="stylesheet" type="text/css" href="style.css"/>

</head>

<!--head end-->

<!--body-->

<body>


<!--导航栏、目录-->

<div>
    <div class="container">
        <div>
            <ul class="banner" >
                <li style="float:left" class="banner"><a class="active" href="index.php">Home</a></li>
                <li class="banner"><a href="CV.pdf">CV</a></li>
                <li class="banner"><a href="grade.php">Grades</a></li>
                <li class="banner"><a href="class-schedule.php">Class Schedule</a></li>
                <li class="banner"><a href="activity.php">Activities</a></li>
                <li class="banner"><a href="self-introduction.html">Self-Introduction</a></li>
            </ul>
        </div>
    </div>
</div>


<!--导航栏目录 END-->



<div style="width: 80%;margin-left: 10%;">
<br> <br> <br>

<div class="left">
    <div class="card">
        <img src="image/ETO.jpg" alt="HU" style="width:100%">
        <div class="container">
            <h2>Tianrui Hu</h2>
            <p>Beijing Univ. Posts & Telecomm</p>
            <p><a href="mailto:hutr96@126.com" >hutr96@126.com</a></p>
            <!--<p><button>Contact</button></p>-->
        </div>
    </div>
    <br>

    <?php if(!isset($_SESSION["username"])){
        echo '
    <div class="card">
    <!--<img src="image/ETO.jpg" alt="HU" style="width:100%">-->
        <div class="container">
        <form action="login.php" method="post">
        Username: <input type="text" name="username"><br>
        Password : <input type="password" name="password"><br>
        <input type="submit" name="submit" value="Login"/>
        <a href="regi.html">
            <p style="opacity: 0.5;">No Account? Click here to register</p></a>
    

        <!--<p><button>Contact</button></p>-->
            
        </form>
        </div>
        </div>
    ';
    }?>
    <?php if (isset($_SESSION["username"])) {
        echo '
        <div class="card">
        WELCOME!<br>
        <botton><a href="logout.php">Logout</a></botton>
        </div>
        ';
    }?>

</div>

<div class="right">
    <h1 style="text-align:center">Welcome to HUTR's website</h1>
    <h1 style="text-align:center">欢迎来到胡天睿的网站</h1>
    <p style="text-align:center">more content is constructing</p>
    <br>
    As a result of the rapid developments in the field of computer science, our lives have become more convenient and colorful because of advanced technologies like the Internet and machine learning. When I took my first computer science course in middle school, I was impressed by the incredible efficiency and potential applicability of computer programs. Although computer science isn't my major in university, I have continued to pursue knowledge and techniques in computer science both in and out of class. The more I have explored the field, the more passionate I have become about it. My career goal is to become a scientist who studies and develops exciting, new technologies to benefit humanity.
    <br><br><br>
    Your program is the ideal first step for me to achieve this goal because your program offers opportunities for me to develop excellent academic knowledge and professional skills necessary for a career in computer science.
    My research interest lies in artificial intelligence (AI) and human-computer interaction (HCI).

</div>

</div>
</body>
</html>