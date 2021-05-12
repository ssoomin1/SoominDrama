<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수민드라마</title>
   <!-- <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet"> -->
   <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../css/basic.css">
   <link rel="stylesheet" href="../css/join_form.css">

    <style type="text/css">
     @import url('https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap');
    
    </style>
    <script type="text/javascript">
        // 회원가입 버튼 이미지 클릭시
        function submitForm(){
            // id칸이 비어 있는가?
            if(!document.member_modify_form.userid.value){
                alert("아이디를 입력하세요.");
                //커서(포커스)를 아이디 인풋요소로 이동
                document.member_modify_form.userid.focus();
                //아래의 submit()을 하면 안되므로...
                return;
            }

            // 비밀번호 비어 있는가?
            if(!document.member_modify_form.passwd.value){
                alert("비밀번호를 입력하세요.");
                document.member_modify_form.passwd.focus();
                return;
            }
             // 비밀번호 확인 비어 있는가?
             if(!document.member_modify_form.pass_chk.value){
                alert("비밀번호 확인을 입력하세요.");
                document.member_modify_form.pass_chk.focus();
                return;
            }
            //비밀번호 확인 답변이 비어있는가?
            if(!document.member_modify_form.check_answer.value){
                alert("확인 답변을 적어주세요.");
                document.member_modify_form.check_answer.focus();
                return;
            }
             // 이름 비어 있는가?
             if(!document.member_modify_form.uname.value){
                alert("이름을 입력하세요.");
                document.member_modify_form.uname.focus();
                return;
            }
            //주소
            if(!document.member_modify_form.address.value){
                alert("주소를 입력하세요.");
                document.member_modify_form.address.focus();
                return;
            }
            //휴대전화 1
            if(!document.member_modify_form.phoneSecond.value){
                alert("전화번호를 입력하세요.");
                document.member_modify_form.phoneSecond.focus();
                return;
            }
            //휴대전화 2
            if(!document.member_modify_form.phoneFinal.value){
                alert("전화번호를 입력하세요.");
                document.member_modify_form.phoneFinal.focus();
                return;
            }
            //이메일
            if(!document.member_modify_form.uEmail.value){
                alert("이메일을 입력하세요.");
                document.member_modify_form.uEmail.focus();
                return;
            }

            //생년월일
            if(!document.member_modify_form.birthday.value){
                alert("생일을 입력하세요.");
                document.member_modify_form.birthday.focus();
                return;
            }

            // 비밀번호와 비밀번호 확인 칸의 입력값이 같은지 비교
            if(document.member_modify_form.passwd.value != document.member_modify_form.pass_chk.value){
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
                document.member_modify_form.passwd.focus();
                // 커서가 이동하고 그곳에 써있는 글씨가 선택되어 있음.
                document.member_modify_form.passwd.select();
                return;
            }
 
            // form요소를 직접 submit하는 메소드
            document.member_modify_form.submit(); //겟 엘리먼트 안하고 폼, 인풋을 name속성이 document 배열로 찾을 수 있음.
        }

        </script>
</head>
<body style="height:auto; width:100%;">
    <!--header-->
    <header>
       <?php include "../lib/header3.php" ?>
    </header>
    <?php
        include ("../lib/db_conn.php");
        //로그인 되어있는 회원의 정보를 읽어오기
        $sql = "select * from member where userid='$userid'";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        
        $user_id=$row['userid'];  //아이디
        $ask=$row['check_pass']; //확인질문
        $check_answer=$row['check_answer'];  //확인답변
        $uname=$row['userName'];  //이름
        $address=$row['address'];  //주소
        $phoneNum=explode("-",$row['phoneNum']);  //휴대전화
        $phoneFirst = $phoneNum[0];
        $phoneSecond = $phoneNum[1];
        $phoneFinal = $phoneNum[2];
        $uEmail=$row['email'];  //이메일
        $birthday=$row['birthday'];  //생일

        mysqli_close($conn);
    ?>

    <section>
        <!--./join.php-->
        <!--   <form action="./member_modify.php?id= method="post" name="member_form"> -->
        <p style="font-size:13px; font-weight: lighter; float:right; margin-right:5%;"> 홈 > 정보수정</p>
        <form action="./member_modify.php?id=<?=$user_id?>" method="post" name="member_modify_form">
        <div id="join_box">
            <br><br>
            <p style="font-size:20px; font-weight: lighter;text-align: center; margin-top:2%;">정보수정</p>
            <p style="font-weight:border; font-size:17px; margin-left:10%;">기본정보</p>
            <div id="basic_table">
                <table>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center; border:none;">아이디</td>
                        <td>
                            <input type="text" name="userid" value="<?=$user_id?>"> &nbsp; (영문소문자/숫자, 4~16자)  
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center; border:none;">비밀번호</td>
                        <td>
                            <input type="password" name="passwd"> 
                            &nbsp; (영문 대소문자/숫자/특수문자 중 3가지 이상 조합, 8자~16자)
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">비밀번호 확인</td>
                        <td>
                            <input type="password" name="pass_chk">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">비밀번호 확인 질문</td>
                        <td>
                            &nbsp; &nbsp; &nbsp;
                            <select name="ask" style="height:30px;">
                                    <option value="내가 다녔던 고등학교는?" selected >내가 다녔던 고등학교는?</option>
                                    <option value="기억에 남는 추억의 장소는?">기억에 남는 추억의 장소는?</option>
                                    <option value="다시 태어나면 되고 싶은 것은?">다시 태어나면 되고 싶은 것은?</option>
                                    <option value="타인이 모르는 자신만의 신체비밀이 있다면?">타인이 모르는 자신만의 신체비밀이 있다면?</option>
                                    <option value="자신이 두번째로 존경하는 인물은?">자신이 두번째로 존경하는 인물은?</option>
                                </select>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">비밀번호 확인 답변</td>
                        <td>
                            <input type="text" name="check_answer" style="width:40%;" value="<?=$check_answer?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">이름</td>
                        <td>
                            <input type="text" name="uname" style="float:left;" value="<?=$uname?>"> &nbsp;
                            ※ 이름을 실명으로 기입하지 않는 경우 배송 및 현장수령 시 문제가 발생할 수 있습니다.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">주소</td>
                        <td>
                            <input type="text" name="address" style="width:40%;" value="<?=$address?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">휴대전화</td>
                        <td>
                            <select name="phoneFirst" style="width:6%; height:20px; margin-left:2%; ">
                                <option value="010">010</option>
                                <option value="011">011</option>
                                <option value="016">016</option>
                                <option value="017">017</option>
                                <option value="018">018</option>
                                <option value="019">019</option>
                            </select> &nbsp; - 
                            <input type="text" name="phoneSecond" style="width:6%; margin:0;" value="<?=$phoneSecond?>"> &nbsp;  - 
                            <input type="text" name="phoneFinal" style="width:6%; margin:0;" value="<?=$phoneFinal?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">이메일</td>
                        <td>
                            <input type="email" name="uEmail" value="<?=$uEmail?>">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">생년월일</td>
                        <td style="border-bottom: none;">
                            <input type="text" name="birthday" value="<?=$birthday?>"> &nbsp; 예) 20030614
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" style="width:8%; height:4%; margin-left: 40%; margin-top:20px;
            border-radius: 2px; cursor:pointer;  background-color:black; color:white; border:none;" onclick="submitForm()">
            수정하기
            </button>

            <button type="submit" style="width:8%; height:4%; margin-left: 1%; margin-top:20px;
            border-radius: 2px; cursor:pointer;  background-color:darkgray; color:white; border:none;">
            취소
            </button>
        </div>
        </form>
    </section>
    <footer>
        <?php include "../lib/footer.php" ?>
    </footer>
</body>
</html>