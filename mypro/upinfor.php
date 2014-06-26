<html>
<head><title>个人信息修改</title></head>
<body background="b3.jpg">
        <?php
        $s_id=$_GET['id'];
        if(!empty($_REQUEST['name'])&&!empty($_REQUEST['sex'])&&!empty($_REQUEST['clas'])&&!empty($_REQUEST['p_number']))
        {
         $name=$_REQUEST['name'];
         $sex=$_REQUEST['sex'];
         $clas=$_REQUEST['clas'];
         $p_num=$_REQUEST['p_number'];
         $conn=mysql_connect("localhost","root","123456") or die("wrong!");
         $con=MySQL_select_db("test") or die("wrong!");
         $sql0="update stu_infor set name='$name' where id='$s_id'";
         $re0=mysql_query($sql0);
         $sql1="update stu_infor set sex='$sex' where id='$s_id'";
         $re1=mysql_query($sql1);
         $sql2="update stu_infor set clas='$clas' where id='$s_id'";
         $re2=mysql_query($sql2);
         $sql3="update stu_infor set p_number='$p_num' where id='$s_id'";
         $re1=mysql_query($sql3);
         if($re0&&re1&&re2&&re3){echo "<script>alert('修改成功')</script>";}
         else{echo "<script>alert('修改失败')</script>";} 
}
        ?>
      <div style="position: absolute; width: 1000px; height:400px; z-index: 1; left: 205px; top: 295px" id="layer1">
      <form name="frm1" method="post" align="center" action=<?php "upinfor.php?id=".$s_id ?>>
      <table width="31%" border="1" align="center" background="q1.JPG">
           <tr>
           <td width="30%" height="35" align="center">你的学号</td>
           <td width="70%" height="35" align="center"><?php echo $s_id ?></td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">姓名</td>
           <td width="70%" height="35" align="center"><input type="text" name="name" /></td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">性别</td>
           <td width="70%" height="35" align="center">
           <input type="radio" name="sex" value="boy">boy  
           <input type="radio" name="sex" value="girl">girl                                           
           </td>
           </tr>
           <tr>
           <td width="30%" height="35" align="center">班级</td>
           <td width="70%" height="35" align="center"><input type="text" name="clas" /></td>
           </tr>
           <tr>
           <tr>
           <td width="30%" height="35" align="center">手机号</td>
           <td width="70%" height="35" align="center"><input type="text" name="p_number" /></td>
           <td><input type="hidden" name="action" value="upinfor" /></td>
           </tr>
           <tr>
           <td height="35" colspan="2" align="center"><input type="submit" name="sub" value="提交" />
           <a href="<?php echo "infor.php?id=".$s_id ?>">返回主页</a>
           </td>
           </tr>
      </table>
      </form>
</div>
</body>
</html>