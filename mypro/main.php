<html>
<head>
<title>Ë«ÊÖÍø</title>
</head>
<body>
  <?php
    $id=$_GET['id'];
  ?>
  <table align="center">
             <tr>
                 <td><img src='logo.png'></td>
             </tr>
             <tr>
                 <td align="center"><font size="10" color="#000066">ËÑÊé</font></td>
             </tr>
             </tr>
  </table>
  <form name="frm" method="post" action=<?php "book.php?id=".$id ?>>
  <table align="center"  width="600px" height="100px">
          <tr>
          <td><input type="hidden" name="action" value=0 /></td>
          <td><input type="text" style="width:500px;height:60px;" name="book_name"/></td>
          <td><input type="submit" style="width:80px;height:60px;font-size:20px" name="sub" value="²éÕÒ"></td>
          </tr>
   </table>
   </form>
</body>
</html>
<?php
?>