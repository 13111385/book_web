<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>������Ϣ</title>
</head>
<body background="pb.jpg">
        <?php
        date_default_timezone_set('Asia/Shanghai');
        $s_id=$_GET['id'];
        echo $s_id."�ĸ�����ҳ";
        $conn=mysql_connect("localhost","root","123456") or die("wrong!");
        $con=MySQL_select_db("test") or die("wrong!");
        $query_user="select * from stu_infor where id='$s_id'";
        $result =mysql_query($query_user);
        $row = mysql_fetch_array($result);
        ?>
       <table border=10 cellpadding=2 width=50% align="center" bordercolorlight=#008000                              bordercolordark=#008060>
       <TR>
       <TD width="250" align="center">ѧ��</TD>
       <td><div  align="center"><?=$row['id']?> </div></td>
       </TR>
       <tr>
       <TD width="250"  align="center">����</TD>
       <td><div  align="center"><?=$row['name']?></div></td>
       </tr>
       <tr>
       <TD width="250"  align="center">�Ա�</TD>
       <td><div  align="center"><?=$row['sex']?></div></td>
       </tr>
       <tr>
       <TD width="250"  align="center">�༶</TD>
       <td><div  align="center"><?=$row['clas']?></div></td>
       </tr>
       <tr>
       <TD width="250"  align="center">�ֻ���</TD>
       <td><div  align="center"><?=$row['p_number']?></div></td>
       </tr>
       <tr>
       <td  colspan="2" align="center"><a href="<?php echo "upinfor.php?id=".$s_id ?>">�޸�</a></td>
       </tr>
      </table>
      <HR align=center width="80%" SIZE=7 color="black">
       <form name="frm2" method="post" action=<?php "infor.php?id=".$s_id ?>>
      <table>
      <tr>
          <td><input type="hidden" name="action" value="form" /></td>
          <td><input type="submit" name="sub" value="�鿴����"></td> 
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
         <TD width="250" align="center">����</TD>
         <TD width="250"  align="center">�۸�</TD>
         <TD width="250"  align="center">���</TD>
         <TD width="250"  align="center">����ֻ���</TD>
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
          <td><input type="submit" name="sub" value="������" align="center"></td> 
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
         echo "����ɹ�";
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
           <td width="30%" height="35" align="center"> ����</td>
           <td width="70%" height="35" align="center"><input type="text" name="name" /></td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">�۸�</td>
           <td width="70%" height="35" align="center"><input type="text" name="price" /></td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center"> ���</td>
           <td width="70%" height="35">
           <input type="radio"name="type" value=1>ͨ��  
           <input type="radio"name="type" value=2>��ѧ
           <input type="radio"name="type" value=3>�����
           <input type="radio"name="type" value=4>��־
           <input type="radio"name="type" value=5>����                                             
           </td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">���ѧ��</td>
           <td width="70%" height="35" align="center"><input type="text" name="seller" /></td>
           </tr>
           <tr>
           <td height="35" colspan="2" align="center"><input type="submit" name="sub" value="�ϼ�" />
           </tr>
          </table>
        </form>
</body>
</html>