<?php 
    //로그인을 하면 session에 정보를 저장하고 각 페이지들에서 모두 사용하고자 함.
    //로그인에 띠라 화면구성이 다르기에 세션에 저장되어 있는 회원정보 중 id, name, level 값 읽어오기
    session_start(); //세션을 저장하든 읽어오든 사용하고자 하면 이 함수로 시작
 
    $userid=""; //회원 아이디
    $userpass=""; // 회원 비밀번호
    $username=""; //회원이름
    $userlevel=""; //회원 레벨 0:관리자 1:회원
    // $userpoint=""; 회원포인트
 
    if( isset($_SESSION['userid'])) $userid= $_SESSION['userid'];
    if( isset($_SESSION['passwd'])) $userpass= $_SESSION['passwd'];
    if( isset($_SESSION['uname'])) $username= $_SESSION['uname'];
    if( isset($_SESSION['userlevel'])) $userlevel=$_SESSION['userlevel'];
?>

<!--맨 위에 SNS, 메뉴바 부분-->
<div class="menu_1">
    <li>&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;</li>
    <li><font color="gray">SNS</font></li>
    <li><a href="https://www.instagram.com/withdrama/?hl=ko">
        <ul id="img_1"><img src="image/instagram.png" border="0" width="25px" height="25px"></ul></a></li>
    <li><a href="https://twitter.com/withdrama"><img src="image/twitter.png"
        width="25px" height="25px"></a></li>
    <div class="menu_2">
        <?php if(!($userid)){ ?>
        <li><a href="Join/join_form.php">JOIN</a></li> <!-- 정보수정 --> 
        <li><a href="Login/login_form.php">LOGIN</a></li> <!-- logout -->
        <?php }else{ ?>
            <li><a href="Login/member_modify_form.php">PROFILE</a></li> <!-- 정보수정 -->
            <li><a href="Login/logout.php">LOGOUT</a></li>
        <?php } ?>

        <?php 
            if($userlevel=='0'){?>
                <li><a href="./manager/index_m.php">관리자홈페이지</a></li>
        <?php }else{ }?>
    </div>
</div>

<div id="box1">
    <h1 style="margin-top:65px; margin-left:120px;">
        <a href="index_3.php" style="text-decoration:none;">
            <img src="image/logoVer2.png" style="width:210px; height:30px; border:none; float:left;">
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp; <input type="text" style="width:400px; height:30px; color:gray;" value="  2021년 시즈그리팅 모음!">
        <button type="submit" style="height:35px;">검색</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button">#데이식스</button>
        <button type="button">#아이즈원</button>
        <button type="button">#GOT7</button>
        <button type="button">#ITZY</button>
        <button type="button">#스트레이 키즈</button>
    </h1>
</div>

<!-- 메인 메뉴바 -->
<div id="main_menu">
    <li><a href="#"><p style="margin-left:90px;">NEW</p></a></li>
    <li><a href="#"><p>BEST</p></a></li>
    <li><a href="#"><p>CD&DVD</p></a></li>
    <li><a href="./show_pro.php"><p>MD</p></a></li>
    <li><a href="#"><p>ARTISTS</p>
        <!-- <div class="dropdown">
            <p class="dropbtn">ARTISTS 
                <i class="fa fa-caret-down"></i>
            </p>
            <div class="dropdown-content">
                <a href="#">데이식스 (DAY6)</a>
                <a href="#">있지 (ITZY)</a>
                <a href="#">펭수</a>
            </div>
        </div> -->
    </a></li>
    <li><a href="#"><p>BOOK</p></a></li>
    <li><a href="#"><p>EVENT</p></a></li>
    <li><a href="#"><p>SALE</p></a></li>
    <li><a href="#"><p>ABOUT US</p></a></li>
    <li><a href="#"><p>COMMUNITY</p></a></li>
</div>
