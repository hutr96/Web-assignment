<?php
//注销
session_start();

    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="index.php">返回主菜单</a>';
    exit;
