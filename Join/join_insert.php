<?php
    //아이디
    //비밀번호
    //비밀번호 확인 질문
    //비밀번호 확인 답변
    //이름
    //주소
    //휴대전화
    //이메일
    //생년월일
    //등록일
    $userid=$_POST['userid']; 
    $my_pass=$_POST['passwd'];
    $ask=$_POST['ask'];
    $check_answer=$_POST['check_answer'];
    $userName=$_POST['uname'];
    $address=$_POST['address'];

    $phoneFirst=$_POST['phoneFirst'];
    $phoneSecond=$_POST['phoneSecond'];
    $phoneFinal=$_POST['phoneFinal'];

    $phoneNum=$phoneFirst.'-'.$phoneSecond.'-'.$phoneFinal;
    $email = $_POST['uEmail'];
    $birthday= $_POST['birthday'];


    include ('../lib/db_conn.php');
    $sql="select * from member where userid='$userid'";
    $result=mysqli_query($conn,$sql);
    $rowNum = mysqli_num_rows($result); //결과로부터 레코드수 얻어오기

    //혹시 $rowNum이 0이 아니면 id가 있다는 것이므로 중복!!
    if($rowNum){
        echo("
            <script>
            alert('해당 아이디가 존재합니다.');
            history.back();
        ");
        exit;
    }

    //exit가 되지 않았다면 신규 id라는 것
    //회원정보 insert

    $insertQ = "insert into member(userid,passwd,check_pass,check_answer,userName,address,phoneNum,email,birthday,userlevel)
                values('$userid','$my_pass','$ask','$check_answer','$userName','$address','$phoneNum','$email','$birthday','1')";
    mysqli_query($conn,$insertQ);
    mysqli_close($conn);

    //데이터 저장이 완료된 후 index.php로 페이지 이동
    echo "<script> location.href ='../index_3.php'</script>";
?>