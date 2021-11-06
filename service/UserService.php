<?php
/**
 * Created by PhpStorm.
 * User: 红军
 * Date: 2021/3/26
 * Time: 18:05
 */
include ("../db/DbManage.php");
class UserService{
    //service层面的UserService类里面的
    //checkLogin函数供controller里面的check_user.php文件调用
    //返回值为空或者返回一条记录的数组。
    public function checkLogin($user_name, $user_pwd){
        //1:组装成一个sql语句供DbManage访问数据库的类使用
        $sqlTxt = "select * from user_info where user_name='"
        . $user_name . "' and user_pwd = '" . $user_pwd . "'";
        //echo $sqlTxt;
        //2:调用DbManage类的函数得到数据值。
        $dbManage = new DbManage();
        $result = null;
        $result = $dbManage->executeSqlTxt($sqlTxt);
        //3:进行数据转换，返回controller层想要的数据和数据格式
        $arrayList = array();//生成一个数组
        while ($myrow = mysqli_fetch_array($result)) {//通过循环，把数据集转换成数组。
            array_push($arrayList, $myrow);
        }
        $dbManage->closeConnection($result);//关闭数据库连接

        return $arrayList;//返回数据集给控制器里面的check_user.php使用。
    }
}