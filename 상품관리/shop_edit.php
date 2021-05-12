<?php
include ("../lib/db_conn.php");
$no=$_POST['no'];
$name=$_POST['name'];
$comment=$_POST['comment'];
$memo = $_POST['memo'];
$price=$_POST['price'];
$final_price=$_POST['final_price'];
$f_name=$_FILES['img']['name'];
 $info_img=$_FILES['info_img']['name'];

$sql = "select * from product where no=$no";
$result=mysqli_query($conn,$sql);
$re=mysqli_fetch_row($result);

$uploads_dir = '../product_img/';
if(!is_dir($uploads_dir)){
    mkdir($uploads_dir);
}

$uploads_dir2 = '../product_info/';
if(!is_dir($uploads_dir2)){
    mkdir($uploads_dir2);
}


if(!$f_name){
    $upload_file = $uploads_dir.basename($re[6]);
    move_uploaded_file($_FILES[$re[6]]['tmp_name'],$upload_file);

    $upload_file2 = $uploads_dir2.basename($re[7]);
    move_uploaded_file($_FILES[$re[7]]['tmp_name'],$upload_file2);
    $sql2="update product set 
        name='$name',comment='$comment',memo='$memo',price=$price,final_price=$final_price,img='$re[6]',info_img='$info_img' where no=$no";
    $result=mysqli_query($conn,$sql2);  
}else{
    $upload_file = $uploads_dir.basename($_FILES['img']['name']);
    move_uploaded_file($_FILES['img']['tmp_name'],$upload_file);

    $upload_file2 = $uploads_dir2.basename($_FILES['info_img']['name']);
    move_uploaded_file($_FILES['info_img']['tmp_name'],$upload_file2);

    $sql2="update product set 
    name='$name',comment='$comment',memo='$memo',price=$price,final_price=$final_price,img='$f_name',info_img='$info_img' where no=$no";
    $result=mysqli_query($conn,$sql2);
}

?>

<script>
    alert('상품이 수정되었습니다.');
    location.href='shop_list.php';
</script>
