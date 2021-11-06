<?php
/**
 * Created by PhpStorm.
 * User: 红军
 * Date: 2021/3/26
 * Time: 18:20
 */

class DbManage{
    private $conn;
    public function executeSqlTxts($sqlTxts){//执行多条sql语句，保证要么都成功，要么都不成功。
        $this->conn = mysqli_connect("127.0.0.1", "root", "123456",
            "php5") or die("失败". mysqli_error());
        $this->conn->autocommit(false);//设置数据库隔离级别为默认
        for ($i = 0; $i < count($sqlTxts); $i++)//循环执行sql语句。其中$sqlTxts是sql语句的数组
            mysqli_query($this->conn, $sqlTxts[$i]);//不管增删改查，php都是一个函数调用。
        $result = $this->conn->commit();//对所有的查询进行提交。
        if ($result == false)
            $this->conn->rollback();//如果失败就回滚，保证要么全部成功，要么一条sql语句都不通过
        return $result;
    }
    public function executeSqlTxt($sqlTxt){
        //执行单条sql语句。增删改（返回true或者false），查返回数据集或者false，
        $this->conn = mysqli_connect("127.0.0.1", "root", "123456",
            "php5") or die("失败". mysqli_error());//数据库连接字符串配置
        $result = mysqli_query($this->conn, $sqlTxt);//进行查询或者增删改查。
        return $result;
    }
    public function closeConnection($result){//关闭连接
        mysqli_free_result($result);
        mysqli_close($this->conn);
    }
}