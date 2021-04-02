<?php
header("Content-type:text/html;charset=utf-8");    //设置编码
header("name:robots;content=noindex, nofollow");
$score = htmlspecialchars(trim($_POST['score']));
$title = htmlspecialchars(trim($_POST['title']));
$message = htmlspecialchars(trim($_POST['message']));
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$time = date("Y-m-d H:i:s");
$conn=mysqli_connect("localhost","admin.db.653e485","rJ:8nR^4lM;4","ioforthc_mysql");
mysqli_set_charset($conn,"utf8");
$sql="insert into wp_reviews(score,title,message,name,email,time)values('$score','$title','$message','$name','$email','$time')";
$que=mysqli_query($conn,$sql);
if(! $que )
{
  die('无法插入数据: ' . mysqli_error($conn));
}
echo "数据插入成功\n";
?>