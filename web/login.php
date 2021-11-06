<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>无标题文档</title>
</head>

<body>
    <?php echo "登录页面" ?>
    <?php
        session_start();
        $check_code = "1234";
        $_SESSION["checkCode"] = $check_code;
    ?>
    <form action="../controller/check_user.php" method="get">
        <div>用户名：<input type="text" name="user_name" maxlength="8" /></div>
        <div>密码：<input type="password" name="user_pwd" maxlength="16" /></div>
        <div>验证码：<input type="text" name="check_code"><?php echo $check_code ?></div>
        <div><input type="submit" value="登录"/></div>
    </form>
</body>
</html>