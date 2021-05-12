<?php
include ("../lib/db_conn.php");

$name=$_POST['name'];
$comment=$_POST['comment'];
$memo = $_POST['memo'];
$price=$_POST['price'];
$final_price=$_POST['final_price'];
$f_name=$_FILES['img']['name'];
$info_img=$_FILES['info_img']['name'];

//$uploads_dir = '../product_img/';
$uploads_dir = 'C:\Bitnami\wampstack-7.4.8-0\apache2\htdocs\my_shoppingmall\product_img';
if(!is_dir($uploads_dir)){
    mkdir($uploads_dir);
}

//$uploads_dir2 = '../product_info/';
$uploads_dir2='C:\Bitnami\wampstack-7.4.8-0\apache2\htdocs\my_shoppingmall\product_info';
if(!is_dir($uploads_dir2)){
    mkdir($uploads_dir2);
}


$upload_file = $uploads_dir.basename($_FILES['img']['name']);
$upload_file2 = $uploads_dir2.basename($_FILES['info_img']['name']);

if(move_uploaded_file($_FILES['img']['tmp_name'],$upload_file)){
    //echo "<script> alert('업로드되었습니다'); </script>";    
}else{
    //echo "<script> alert('실패'); </script>";
}

move_uploaded_file($_FILES['info_img']['tmp_name'],$upload_file2);

$sql="insert into product (name,comment,memo,price,final_price,img,info_img) 
values ('$name','$comment','$memo',$price,$final_price,'$f_name','$info_img')";
$result=mysqli_query($conn,$sql);

?>
<script>
    alert('상품이 등록되었습니다.');
    location.href='shop_list.php';
</script>
