<?php
 session_start();
?>
<html>
<head><title>双手网</title></head>
<body background="b.jpg">
<?php
  $id=$_SESSION['id'];
  if(!isset($_SESSION['id'])||empty($_GET['id'])) {echo "<a href='login.php'>请登陆</a>";}
  else{
        echo $_GET['id'].",你好"."<a href='logout.php?id='.$id>退出</a>"."<br/>";
?>
       <a href="<?php echo "infor.php?id=".$id ?>">个人中心</a>
<?php
       }
?>
  <table align="center">
             <tr>
                 <td><img src='b2.jpg'></td>
             </tr>
             <tr>
                 <td align="center"><font size=30px color="blue">双手网</font></td>
             </tr>
            
  </table>
  <form name="frm" method="post" action=<?php "book.php?id=".$id ?>>
  <table align="center"  width="600px" height="100px">
          <td><input type="hidden" name="action" value=0 /></td>
          <td><input type="text" style="width:500px;height:60px;" name="book_name"/></td>
          <td><input type="submit" style="width:80px;height:60px;font-size:20px" name="sub" value="搜书"></td>
   </table>
  </form>
<table align="center">
<tr align="cenetr">
<form name="frm1" method="post" action=<?php "book.php?id=".$id ?>>
          <td><input type="hidden" name="action" value=1 /></td>
          <td><input type="image"  name="sub" src="s1.jpg"></td>
  </form>
  <form name="frm2" method="post" action=<?php "book.php?id=".$id ?>>
          <td><input type="hidden" name="action" value=2 /></td>
          <td><input type="image"  name="sub" src="s2.jpg"></td>
  </form>
   <form name="frm3" method="post" action=<?php "book.php?id=".$id ?>>
          <td><input type="hidden" name="action" value=3 /></td>
          <td><input type="image"  name="sub" src="s3.jpg"></td>
  </form>
   <form name="frm4" method="post" action=<?php "book.php?id=".$id ?>>
          <td><input type="hidden" name="action" value=4 /></td>
          <td><input type="image"  name="sub" src="s4.jpg"></td>
  </form>
  <form name="frm5" method="post" action=<?php "book.php?id=".$id ?>>
       <td><input type="hidden" name="action" value=5 /></td>
       <td><input type="image"  name="sub" src="s5.jpg"></td>
  </form>
</tr>
</table>
<?php
  $str=$_REQUEST['book_name'];
  $act=$_REQUEST['action'];
  $conn=mysql_connect("localhost","root","123456") or die("wrong!");
  $con=MySQL_select_db("test") or die("wrong!");
  if($act==0){
    if($str!="")
    { $s="%".$str."%";
    $query_user="select * from book where name like '$s'and state=0";
    }
    else{$s="";
     $query_user="select * from book where name='$s'and state=0";
     }
   }
  else{
    $query_user="select * from book where type='$act'and state=0"; 
  }
    $result =mysql_query($query_user);
    if(mysql_num_rows($result)==0&&(!empty($_REQUEST['action'])||($act==0&&!empty($_REQUEST['book_name']))))    {echo "<script>alert('查不到可买书')</script>";}
     while($row = mysql_fetch_array($result))
     {
     $x=$row['seller'];
     if(!isset($_SESSION['id'])||empty($_GET['id'])) {$id=null;}
     $sql="select * from stu_infor where id='$x'";
     $re=mysql_query($sql);
     $r=mysql_fetch_array($re);
?>
    <table border=10 cellpadding=2 width=80% align="center">
    <TR>
      <TD width="250" align="center">书名</TD>
      <TD width="250"  align="center">价格</TD>
      <TD width="250"  align="center">卖家</TD>
      <TD width="250"  align="center">联系方式</TD>
    </TR>
    <TR>
       <td><div   align="center"><?=$row['name']?> </div></td>
       <td><div   align="center"><?=$row['price']?></div></td>
       <td><div   align="center"><?=$row['seller']?></div></td>
       <td><div   align="center"><?=$r['p_number']?></div></td>
       <form name="frm5" method="post" action="buy.php">
       <td width="0"><input type="hidden" name="id" value=<?=$id?> /></td>
       <td width="0"><input type="hidden" name="book_number" value=<?=$row['id']?> /></td>
       <td><input type="submit" name="sub" value="购买"></td>
       </form>   
     </TR>	
    </table>
<?php  
    }
?>
   <marquee style="WIDTH: 1000px; HEIGHT: 200px" scrollamount="2" direction="left" align="center">
        <p align="center"><font color="#ff6600" size="4" >公告：欢迎大家对双手网的支持,请大家自觉遵守交易规         则!否则后果自负。本网站只用于二手书交易，欢迎大家批评与建议。</font ></p >
        <p ><a href=http://www.xidian.edu.cn/><img src="xd.jpg" border=0></a></p >
    </marquee >
</body>
</html>
</body>