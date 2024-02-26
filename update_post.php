<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
    <head>
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
    <title>Simple Blog System—修改文章</title>
    </head>
    <body>
        <h1>修改文章</h1>
        <?php
        require('config.php');
        
        date_default_timezone_set('Asia/Shanghai');
        
        @ $db=new mysqli($db_host,$db_username,$db_password,$db_database);
        if(mysqli_connect_errno()){
            echo '错误，无法连接到数据库，请重试';
            exit;
          }

          //设置字符集
          $db->query("SET NAMES utf8");

          if($_SERVER['REQUEST_METHOD']=='POST'){
            //处理表单提交
            $id=$_POST['id'];
            $title=$_POST['title'];
            $content=$_POST['content'];

            if (!$title || !$content)
            {
                echo '你未输入文章的标题或正文.<br />'.'请退回再次重试.';
                exit;
            }
            if (!get_magic_quotes_gpc()) {
                $title = addslashes($title);
                $body = addslashes($content);
            }

            $query="UPDATE post SET post_title='$title',post_content='$content' WHERE id=$id;";
            $result=$db->query($query);

            if($result){
                echo '文章已成功更新';
                exit;
            }else{
                echo '文章更新失败，请检查代码';
                exit;
            }

          }else{
            //没有表单提交显示修改界面
            $id=$_GET['id'];
            $query="SELECT * FROM post WHERE id=$id;";
            $result=$db->query($query);
            $row=$result->fetch_assoc();

            if($row){
                $title=htmlspecialchars(stripslashes($row['post_title']));
                $content=htmlspecialchars(stripslashes($row['post_content']));
                echo '<form action="update_post.php" method="post">
                        <input type="hidden" name="id" value="' . $id . '">
                        <p>标题:<input type="text" name="title" value="'.$title.'"></p>
                        <p>内容:<textarea name="content" rows="10" cols="50">'.$content.'</textarea></p>
                        <p><input type="submit" value="更新"></p>
                      </form>';
            }else{
                echo "未找到文章";
            }
          }
          $db->close();
        ?>

    </body>
</html>