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
            if(!document.join_form.userid.value){
                alert("아이디를 입력하세요.");
                //커서(포커스)를 아이디 인풋요소로 이동
                document.join_form.userid.focus();
                //아래의 submit()을 하면 안되므로...
                return;
            }

            // 비밀번호 비어 있는가?
            if(!document.join_form.passwd.value){
                alert("비밀번호를 입력하세요.");
                document.join_form.passwd.focus();
                return;
            }
             // 비밀번호 확인 비어 있는가?
             if(!document.join_form.pass_chk.value){
                alert("비밀번호 확인을 입력하세요.");
                document.join_form.pass_chk.focus();
                return;
            }
            //비밀번호 확인 답변이 비어있는가?
            if(!document.join_form.check_answer.value){
                alert("확인 답변을 적어주세요.");
                document.join_form.check_answer.focus();
                return;
            }
             // 이름 비어 있는가?
             if(!document.join_form.uname.value){
                alert("이름을 입력하세요.");
                document.join_form.uname.focus();
                return;
            }
            //주소
            if(!document.join_form.address.value){
                alert("주소를 입력하세요.");
                document.join_form.address.focus();
                return;
            }
            //휴대전화 1
            if(!document.join_form.phoneSecond.value){
                alert("전화번호를 입력하세요.");
                document.join_form.phoneSecond.focus();
                return;
            }
            //휴대전화 2
            if(!document.join_form.phoneFinal.value){
                alert("전화번호를 입력하세요.");
                document.join_form.phoneFinal.focus();
                return;
            }
            //이메일
            if(!document.join_form.uEmail.value){
                alert("이메일을 입력하세요.");
                document.join_form.uEmail.focus();
                return;
            }

            //생년월일
            if(!document.join_form.birthday.value){
                alert("생일을 입력하세요.");
                document.join_form.birthday.focus();
                return;
            }

            // 비밀번호와 비밀번호 확인 칸의 입력값이 같은지 비교
            if(document.join_form.passwd.value != document.join_form.pass_chk.value){
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요.");
                document.join_form.passwd.focus();
                // 커서가 이동하고 그곳에 써있는 글씨가 선택되어 있음.
                document.join_form.passwd.select();
                return;
            }
 
            // form요소를 직접 submit하는 메소드
            document.join_form.submit(); //겟 엘리먼트 안하고 폼, 인풋을 name속성이 document 배열로 찾을 수 있음.
        }

        function checkID(){
          //아이디 중복확인
          window.open("check_id.php?userid="+document.join_form.userid.value.trim(),
          "IDcheck","left=70%,top=30%,width=300, height=50, scrollbars=no, resizable=no");
        }
        </script>
</head>
<body style="height:auto; width:100%;">
    <!--header-->
    <header>
       <?php include "../lib/header3.php" ?>
    </header>
    <section>
        <!--./join.php-->
        <form name="join_form" method="post" action="join_insert.php">
        <p style="font-size:13px; font-weight: lighter; float:right; margin-right:5%;"> 홈 > 회원 가입</p>
        <div id="join_box">
            <br><br>
            <p style="font-size:20px; font-weight: lighter;text-align: center; margin-top:2%;">회원 가입</p>
            <p style="font-weight:border; font-size:17px; margin-left:10%;">기본정보</p>
            <div id="basic_table">
                <table>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center; border:none;">아이디</td>
                        <td>
                            <input type="text" name="userid"> &nbsp; (영문소문자/숫자, 4~16자)   &nbsp;&nbsp;&nbsp;
                            <button type="button" onclick="checkID()">아이디중복확인</button>
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
                                <option value="내가 다녔던 고등학교는?">내가 다녔던 고등학교는?</option>
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
                            <input type="text" name="check_answer" style="width:40%;">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">이름</td>
                        <td>
                            <input type="text" name="uname" style="float:left;"> &nbsp;
                            ※ 이름을 실명으로 기입하지 않는 경우 배송 및 현장수령 시 문제가 발생할 수 있습니다.
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">주소</td>
                        <td>
                            <input type="text" name="address" style="width:40%;">
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
                            <input type="text" name="phoneSecond" style="width:6%; margin:0;"> &nbsp;  - 
                            <input type="text" name="phoneFinal" style="width:6%; margin:0;">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">이메일</td>
                        <td>
                            <input type="email" name="uEmail">
                        </td>
                    </tr>
                    <tr>
                        <td style="width:15%; background-color: #FBFAFA; text-align:center;border:none;">생년월일</td>
                        <td style="border-bottom: none;">
                            <input type="text" name="birthday"> &nbsp; 예) 20030614
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" style="width:8%; height:4%; margin-left: 48%; margin-top:20px;
            border-radius: 2px; cursor:pointer;  background-color:black; color:white; border:none;" onclick="submitForm()">
            회원가입
            </button>
        </div>
        </form>
    </section>
    <footer>
        <?php include "../lib/footer.php" ?>
    </footer>
</body>
</html>