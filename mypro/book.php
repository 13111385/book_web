<?php
 session_start();
?>
<html>
<head><title>˫����</title></head>
<body background="b.jpg">
<?php
  $id=$_SESSION['id'];
  if(!isset($_SESSION['id'])||empty($_GET['id'])) {echo "<a href='login.php'>���½</a>";}
  else{
        echo $_GET['id'].",���"."<a href='logout.php?id='.$id>�˳�</a>"."<br/>";
?>
       <a href="<?php echo "infor.php?id=".$id ?>">��������</a>
<?php
       }
?>
  <table align="center">
             <tr>
                 <td><img src='b2.jpg'></td>
             </tr>
             <tr>
                 <td align="center"><font size=30px color="blue">˫����</font></td>
             </tr>
            
  </table>
  <form name="frm" method="post" action=<?php "book.php?id=".$id ?>>
  <table align="center"  width="600px" height="100px">
          <td><input type="hidden" name="action" value=0 /></td>
          <td><input type="text" style="width:500px;height:60px;" name="book_name"/></td>
          <td><input type="submit" style="width:80px;height:60px;font-size:20px" name="sub" value="����"></td>
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
    if(mysql_num_rows($result)==0&&(!empty($_REQUEST['action'])||($act==0&&!empty($_REQUEST['book_name']))))    {echo "<script>alert('�鲻��������')</script>";}
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
      <TD width="250" align="center">����</TD>
      <TD width="250"  align="center">�۸�</TD>
      <TD width="250"  align="center">����</TD>
      <TD width="250"  align="center">��ϵ��ʽ</TD>
    </TR>
    <TR>
       <td><div   align="center"><?=$row['name']?> </div></td>
       <td><div   align="center"><?=$row['price']?></div></td>
       <td><div   align="center"><?=$row['seller']?></div></td>
       <td><div   align="center"><?=$r['p_number']?></div></td>
       <form name="frm5" method="post" action="buy.php">
       <td width="0"><input type="hidden" name="id" value=<?=$id?> /></td>
       <td width="0"><input type="hidden" name="book_number" value=<?=$row['id']?> /></td>
       <td><input type="submit" name="sub" value="����"></td>
       </form>   
     </TR>	
    </table>
<?php  
    }
?>
   <marquee style="WIDTH: 1000px; HEIGHT: 200px" scrollamount="2" direction="left" align="center">
        <p align="center"><font color="#ff6600" size="4" >���棺��ӭ��Ҷ�˫������֧��,�����Ծ����ؽ��׹�         ��!�������Ը�������վֻ���ڶ����齻�ף���ӭ��������뽨�顣</font ></p >
        <p ><a href=http://www.xidian.edu.cn/><img src="xd.jpg" border=0></a></p >
    </marquee >
</body>
</html>
</body>