<?php
/**
 * Created by PhpStorm.
 * User: 红军
 * Date: 2021/3/19
 * Time: 18:43
 */
    include("../service/UserService.php");
    //1:初始化
    session_start();//不加入这句话，$_SESSION是取不到值的
    $name = $_GET["user_name"];
    $pwd = $_GET["user_pwd"];
    $checkCode = $_GET["check_code"];
    if ($checkCode != $_SESSION["checkCode"]){//因为如果验证码没有通过,就没必要去链接数据库了.
        header("Location:../web/login.php");
    }
    //2:把初始化好的数据传递给service层下面的类进行处理。并得到service层返回的数据
    $userService = new UserService();
    $result = $userService->checkLogin($name, $pwd);//很明显，返回值是数组，可以根据数组长度来处理跳转
    //3:根据返回值进行调整
    if (count($result) > 0){//说明存在数据，把数据存入session。并调整到主页面。
        $_SESSION["usr_info"] = $result;
        header("Location:../web/main.php");
    }
    else //跳转回login.php页面进行重新登录
        header("Location:../web/login.php");
