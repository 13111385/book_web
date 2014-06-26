<?php
 session_start();
 $id=$_REQUEST['id'];
 $book_number=$_REQUEST['book_number'];
 $conn=mysql_connect("localhost","root","123456") or die("wrong!");
 $con=MySQL_select_db("test") or die("wrong!");
 $query_user="select * from student where id='$id'"; 
 $result =mysql_query($query_user);
  if(mysql_num_rows($result)!=0){
    $query_user="update book set buyer='$id' where id='$book_number'";
    $result =mysql_query($query_user);
    $q="update book set state=1 where id='$book_number'";
    $r=mysql_query($q);
    echo "<script>alert('购买成功')</script>";
?>
    <a href=<?php echo "book.php?id=".$id ?>>返回</a>
<?php
  }
 else{
    echo "<script>alert('购买失败')</script>";
?>
     <a href="book.php">返回</a>
<?php
  }
?>
