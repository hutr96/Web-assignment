<?php
/**
 * Created by IntelliJ IDEA.
 * User: hutr
 * Date: 2018/1/14
 * Time: 下午8:41
 */
session_start();
//if($_GET['action'] == "logout"){
    unset($_SESSION['username']);
    echo '注销登录成功！点击此处 <a href="index.php">返回主菜单</a>';
    exit;
//}