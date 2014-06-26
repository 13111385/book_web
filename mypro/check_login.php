<?php
session_start();
$conn=mysql_connect("localhost","root","123456") or die("wrong!");
$con=MySQL_select_db("test") or die("wrong!");
$id=$_REQUEST['id'];
$pas=$_REQUEST['pas'];
$query_user="select * from student where id= '$id' and password='$pas'";
$result =mysql_query($query_user);
$row = mysql_fetch_array($result);
if(empty($row))
{
    echo 'login fail!';
?>
<p><a href="./login.php">·µ»ØµÇÂ½</a></p>
<?php
}else{
  if(isset($_SESSION[$id])) {echo "ÖØ¸´µÇÂ¼!";}
  else{
       $_SESSION['id']=$id;
       header("location:book.php?id=".$id);
  }
}
?>