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
    $query="SELECT * FROM user WHERE username = '$username';";
    $result=$db->query($query);

    if($result->num_rows>0){
        //查询到已有账户
        $row=$result->fetch_assoc();
        if($row['password']===$password){
            //密码匹配，设置session
            $_SESSION['loggedin']=true;
            $_SESSION['username']=$username;
            header("Location:list_post.php");//重定向
            exit;
        }else{
            echo "用户名或密码有误";
        }
    }else{
        echo $query;
        var_dump($result);
        echo "未查询到用户";
    }

    $db->close();
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
        <title>Simple Blog System—登录</title>
    </head>
    <body>
        <h2>登录</h2>
        <?php if(isset($error)):?>
            <p><?php echo $error;?></p>
        <?php endif; ?>
        <form action="login.php" method="post">
            <p>用户名:<input type="text" name="username"></p>
            <p>密码:<input type="password" name="password"></p>
            <p><input type="submit" value="登录"> <a href="register.php">注册</a></p>
        </form>
    </body>
</html>