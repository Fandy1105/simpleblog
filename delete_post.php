<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<title>Simple Blog System—删除文章</title>
</head>
<body>
    <h1>删除文章</h1>
    <?php
    require('config.php');
    $post_id=$_GET['id'];//获取要删除文章id
    
    if(!$post_id){
      echo '错误，未找到要删除文章';
      exit;
    }

    @ $db=new mysqli($db_host,$db_username,$db_password,$db_database);

    if(mysqli_connect_errno()){
      echo '错误，无法连接到数据库，请重试';
      exit;
    }
    //设置字符集
    $db->query("SET NAMES utf8");

    $query="DELETE FROM post WHERE id=".($post_id).";";
    echo '<pre>' . $query . '</pre>' ;

    $result=$db->query($query);
    if($result)
      echo $db->affected_rows.'记录已被删除';
    else 
      echo '删除文章出错，请检查代码';
    
      $db->close();
    ?>
</body>