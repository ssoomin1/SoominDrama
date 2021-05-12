<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수민드라마</title>
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/basic.css">
    <link rel="stylesheet" href="../css/login.css"> 
    <style type="text/css">
     @import url('https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap');
    </style>
    <!--자바스크립트 시작-->
    <script>

    </script>
</head>
<body style="height:auto; width:100%">
    <!--header-->
    <header>
        <?php include "../lib/header3.php" ?>
    </header>
    <section>
        <form method="post" action="login.php">
        <p style="font-size:13px; font-weight: lighter; float:right; margin-right:5%;">홈 > 로그인</p>
        <div id="login_box">
            
            <h3 style="text-align:center; font-weight: normal; margin-top:70px;"> 로그인 </h3>
            <h4 style="text-align: center; font-weight: lighter;"> LOGIN </h4>
            <input type="text" style="width: 50%; height:7%; margin-left:24%;" name="userid">
            <input type="password" style="width: 50%; height:7%; margin-left: 24%; margin-top:2%;" name="passwd">
            <input type="checkbox" style="margin-left:24%; margin-top:3%;" name="remember">아이디 저장
            <img src="../image/보안접속.JPG"> 보안접속 
            <button type="submit" style="margin-top:2%; background-color:black; border:none; color:white;">로그인</button>
            
            <div id="login_option">
                <ul>
                    <li style="margin-left: -7%;"><a href="#">아이디찾기</li>
                    <li><a href="#">비밀번호찾기</li>
                    <li><a href="../Join/join_form.php">회원가입</a></li>
                </ul>
            </div>
            
            <button type="submit" 
                style="background-color:#4A6EA9; border:none; color:white;">페이스북 로그인</button>

            <button type="submit" 
                style="background-color:#FFE812; border:none; margin-top:1.5%;">카카오 로그인</button>
        </div>
        </form>
    </section>
    <footer>
         <?php include "../lib/footer.php" ?>
    </footer>
    </body>
</html>