<meta charset="utf-8">
<?php

    $id=$_GET['userid'];

    //값 전달 안되었을수도 있으니까
    if(!$id){
        echo "아이디를 입력하세요";
        exit;
    }

    include ("../lib/db_conn.php");

    $sql = "select * from member where userid='$id'";
    $result=mysqli_query($conn,$sql);
    //결과값 개수
    $rowNum = mysqli_num_rows($result);

    if($rowNum){
        echo "이미 있는 아이디입니다. <br>";
        echo "다른 아이디를 사용해주세요. <br>";
    }else{
        echo "사용가능한 아이디입니다.";
    }

    mysqli_close($conn);
?>