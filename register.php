<?php session_start();

if($_SERVER['REQUEST_METHOD']=='POST'){
    require('config.php');

    @ $db=new mysqli($db_host,$db_username,$db_password,$db_database);

    if(mysqli_connect_errno()){
        echo "错误，无法连接到数据库";
        exit;
    }
    $username=$_POST['username'];
    $password=$_POST['password'];

    // 设置字符集
    $db->query("SET NAMES utf8");
    //创建数据库语句
    $check="SELECT id FROM user WHERE username = '$username';";
    $checkResult=$db->query($check);
    if($checkResult->num_rows>0){
        $error='用户已存在';
    }else{
        $query="INSERT INTO user VALUES (NULL,'$username', '$password');";
        $result=$db->query($query);

        if($result){
            echo '注册成功!请<a href="login.php">登录</a>';
        }else{
            echo '注册失败，请重试';
        }
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>Simple Blog System—注册</title>
    </head>
    <body>
        <h2>注册</h2>
        <?php if(isset($error)):?>
            <p><?php echo $error;?></p>
        <?php endif; ?>
        <form action="register.php" method="post">
            <p>用户名:<input type="text" name="username"></p>
            <p>密码:<input type="password" name="password"></p>
            <p><input type="submit" value="注册"> <a href="login.php">已有账户？登录</a></p>
        </form>
    </body>
</html>