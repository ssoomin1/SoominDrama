<?php
    $userid=$_GET['id'];

    //post로 전달받은 것들
    $passwd=$_POST['passwd']; //비밀번호
    $ask=$_POST['ask']; //비밀번호 질문
    $check_answer=$_POST['check_answer']; //답
    $userName=$_POST['uname']; //이름
    $address=$_POST['address']; //주소


    $phoneFirst=$_POST['phoneFirst'];
    $phoneSecond=$_POST['phoneSecond'];
    $phoneFinal=$_POST['phoneFinal'];

    $phoneNum=$phoneFirst.'-'.$phoneSecond.'-'.$phoneFinal;
    $email = $_POST['uEmail'];
    $birthday= $_POST['birthday'];

    include ('../lib/db_conn.php');

    $updateQ = "update member set passwd='$passwd',check_pass='$ask',check_answer='$check_answer',userName='$userName',
    address='$address',phoneNum='$phoneNum',email='$email',birthday='$birthday' where userid='$userid'";
    mysqli_query($conn,$updateQ);
    mysqli_close($conn);

    echo 
    "<script>
        location.href='../index_3.php'
    </script>";
?>
