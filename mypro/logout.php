<?php
  $id=$_GET['id'];
  unset($_SESSION['id']);
  $id=null;
  header("location:book.php?id=".$id);
?>