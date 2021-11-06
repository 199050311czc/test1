<?php
/**
 * Created by PhpStorm.
 * User: 红军
 * Date: 2021/3/19
 * Time: 17:47
 */
    echo "这是我的第一个php程序, hello world <br>";
    $myName = "tanghongjun";
    echo $myName  . "<br>";
    $myName = 30;
    echo $myName . "<br>";
    for ($i = 10; $i < 20; $i++){
        echo $i . "<br>";
    }

    function getNewMyName($myNmae){
        $newMyName = $myNmae . "@hdu.edu.cn";
        echo $newMyName . "<br>";
        return $newMyName;
    }

    $myName = getNewMyName("唐红军");
    echo $myName;