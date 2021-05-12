<?php

//아이디
//비밀번호

$userid=$_POST['userid']; 
$passwd=$_POST['passwd'];


//아이디와 비밀번호 입력 여부 확인
if(!$userid){
    echo "<script> alert('아이디를 입력하세요'); history.go(-1); </script>";
    exit;
}
if(!$passwd){
    echo "<script> alert('비밀번호를 입력하세요'); history.back(); </script>";
    exit;
}

//exit가 안되었다면 아이디와 비번이 전달된 것이므르 db에서 해당 아이디 비번 체크

include ('../lib/db_conn.php');

$sql="select * from member where userid='$userid' and passwd='$passwd'";
$result=mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result); //결과로부터 레코드수 얻어오기

if(!$rowNum){
    echo "<script>alert('아이디 또는 비밀번호가 일치하지 않습니다.'); history.back(); </script>";
    exit;
}

//exit가 되지 않았다면 로그인 되었음 =>세션 저장
//해당하는 id의 회원정보 얻어오기
$row=mysqli_fetch_assoc($result);

session_start();
$_SESSION['userid'] = $row['userid'];
$_SESSION['passwd'] = $row['passwd'];
$_SESSION['uname'] = $row['userName'];
$_SESSION['userlevel']=$row['userlevel'];

//관리자라면 관리자 홈페이지로!
if($row['userlevel']==0){
    echo "<script>
    alert('관리자님 어서오세요!');
    location.href='../manager/index_m.php';
    </script>";
} else{ //0이 아니라면 일반 회원
    //데이터 저장이 완료된 후 index.php로 페이지 이동
    echo "<script> location.href ='../index_3.php'</script>";
}
?>
