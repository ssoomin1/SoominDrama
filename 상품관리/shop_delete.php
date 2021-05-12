<?php
include ('../lib/db_conn.php');
$no=$_GET['no']; 
       
$sql="delete from product where no=$no";
mysqli_query($conn,$sql);
echo "<script>alert('삭제되었습니다.'); location.href='./shop_list.php'; </script>";

?>