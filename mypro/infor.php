<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>个人信息</title>
</head>
<body background="pb.jpg">
        <?php
        date_default_timezone_set('Asia/Shanghai');
        $s_id=$_GET['id'];
        echo $s_id."的个人主页";
        $conn=mysql_connect("localhost","root","123456") or die("wrong!");
        $con=MySQL_select_db("test") or die("wrong!");
        $query_user="select * from stu_infor where id='$s_id'";
        $result =mysql_query($query_user);
        $row = mysql_fetch_array($result);
        ?>
       <table border=10 cellpadding=2 width=50% align="center" bordercolorlight=#008000                              bordercolordark=#008060>
       <TR>
       <TD width="250" align="center">学号</TD>
       <td><div  align="center"><?=$row['id']?> </div></td>
       </TR>
       <tr>
       <TD width="250"  align="center">姓名</TD>
       <td><div  align="center"><?=$row['name']?></div></td>
       </tr>
       <tr>
       <TD width="250"  align="center">性别</TD>
       <td><div  align="center"><?=$row['sex']?></div></td>
       </tr>
       <tr>
       <TD width="250"  align="center">班级</TD>
       <td><div  align="center"><?=$row['clas']?></div></td>
       </tr>
       <tr>
       <TD width="250"  align="center">手机号</TD>
       <td><div  align="center"><?=$row['p_number']?></div></td>
       </tr>
       <tr>
       <td  colspan="2" align="center"><a href="<?php echo "upinfor.php?id=".$s_id ?>">修改</a></td>
       </tr>
      </table>
      <HR align=center width="80%" SIZE=7 color="black">
       <form name="frm2" method="post" action=<?php "infor.php?id=".$s_id ?>>
      <table>
      <tr>
          <td><input type="hidden" name="action" value="form" /></td>
          <td><input type="submit" name="sub" value="查看订单"></td> 
      </tr>
      </table>
      </form>
<?php
      $act=$_REQUEST['action'];
      if($act=="form")
      {
         $qu2="select * from book where seller='$s_id' and state<>0";
         $re2=mysql_query($qu2);
         while($row = mysql_fetch_array($re2))
         {
          $x=$row['seller'];
          $sql="select * from stu_infor where id='$x'";
          $re=mysql_query($sql);
          $r=mysql_fetch_array($re);
?>
         <table>
         <TR>
         <TD width="250" align="center">书名</TD>
         <TD width="250"  align="center">价格</TD>
         <TD width="250"  align="center">买家</TD>
         <TD width="250"  align="center">买家手机号</TD>
         </TR>
         <TR>
         <td><div   align="center"><?=$row['name']?> </div></td>
         <td><div   align="center"><?=$row['price']?></div></td>
         <td><div   align="center"><?=$row['buyer']?></div></td>
         <td><div   align="center"><?=$r['p_number']?></div></td>
         </TR>	
         </table>
<?php
          }
?>
         <form name="frm2" method="post" action=<?php "infor.php?id=".$s_id ?>>
         <table>
         <tr>
          <td><input type="hidden" name="action" value="dealform" /></td>
          <td><input type="submit" name="sub" value="处理订单" align="center"></td> 
          </tr>
         </table>
         </form>
<?php
       }
       if($act=="dealform")
       { 
         $tim=(string)date("Y/m/d/H:i");
         $sql1="select * from book where seller='$s_id' and state<>0";
         $res1=mysql_query($sql1);
         while($row= mysql_fetch_array($res1))
         {
           $name=$row['name'];$buyer=$row['buyer'];
           $sql2="insert into form values('{$name}','{$s_id}','{$buyer}','{$tim}')";
           $res2=mysql_query($sql2);
         }
         $qu3="delete from book where seller='$s_id' and state<>0";
         $re3 =mysql_query($qu3);
         echo "处理成功";
        }
        if($act=="newbook")
        {
         $name=$_REQUEST['name'];
         $price=floatval($_REQUEST['price']);
         $type=$_REQUEST['type'];
         $seller=$_REQUEST['seller'];
         $id=rand(0,10000);
         $qu2="insert into book values('{$name}',$price,'{$seller}',null,$type,null,0,$id)";
         $re2=mysql_query($qu2);
         }
?>
          <HR align=center width="80%" SIZE=7 color="black">
          <form name="frm3" method="post" action=<?php "infor.php?id=".$s_id ?>>
           <table border=10 cellpadding=2 width=40% align="center" bordercolorlight=#008000              bordercolordark=#008060>
            <td><input type="hidden" name="action" value="newbook" /></td>
           <tr>
           <td width="30%" height="35" align="center"> 书名</td>
           <td width="70%" height="35" align="center"><input type="text" name="name" /></td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">价格</td>
           <td width="70%" height="35" align="center"><input type="text" name="price" /></td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center"> 类别</td>
           <td width="70%" height="35">
           <input type="radio"name="type" value=1>通信  
           <input type="radio"name="type" value=2>文学
           <input type="radio"name="type" value=3>计算机
           <input type="radio"name="type" value=4>杂志
           <input type="radio"name="type" value=5>考试                                             
           </td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">你的学号</td>
           <td width="70%" height="35" align="center"><input type="text" name="seller" /></td>
           </tr>
           <tr>
           <td height="35" colspan="2" align="center"><input type="submit" name="sub" value="上架" />
           </tr>
          </table>
        </form>
</body>
</html>