<?php
  $conn=mysql_connect("localhost","root","123456") or die("wrong!");
  $con=MySQL_select_db("test") or die("wrong!");
  $id=$_POST['id'];
  $name=$_POST['name'];
  $pas=$_POST['pas'];
  $n1=strlen($id);
  $n2=strlen($name);
  $n3=strlen($pas);
  if($n1>=1&&$n1<=10&&$n2>=1&&$n2<=10&&$n3>=1&&$n3<=6){
    $sql="insert into student values('{$id}','{$name}','{$pas}')";
    $result=mysql_query($sql);
    $sql2="insert into stu_infor values('{$id}','{$name}',null,null,null)";
    $r2=mysql_query($sql2);
    if($result) 
    {   echo "注册成功!";
?>
        <table>
        <tr><td>现在登录? <a href='login.php'>登录</a></td></tr>
        </table>
<?php
     }
  }
  else include("enrol.php");
 ?>