<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자페이지</title>
   <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../css_m/basic.css">
   <link rel="stylesheet" href="../css_m/show_m.css"> 

    <script type="text/javascript">
    </script>
    <style type="text/css">
     @import url('https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap');
    </style>
    <!--css의 끝-->
</head>
<body style="height:auto; width:100%;">
    <!--header-->
    <header>
         <!-- 공통사용 php문서 외부 추가하기 : 공통 사용하는 php는 lib폴더에 작성 -->
         <?php include "../manager/header.php"?>
    </header>
    <section>
        <?php
            include ("./lib/db_conn.php");
            if(isset($_GET['page'])){
                $page=$_GET['page'];
            }else{
                $page=1;
            }
        ?>

        <!--
        userid
        userName
        address
        phoneNum
        email
        birthday
        joinDate
        -->
        <div id="login_box">
            <div id="add_box">
            <table style="margin-top:2%;">
                <tr>
                    <th style="width:10%; text-align: center;">아이디</th>
                    <th style="width:10%; text-align: center;">이름</th>
                    <th style="width:15%; text-align: center;">주소</th>
                    <th style="width:15%; text-align: center;">전화번호</th>
                    <th style="width:15%; text-align: center;">이메일</th>
                    <th style="width:10%; text-align: center;">생일</th>
                    <th style="width:10%; text-align: center;">가입일</th>
                    <th style="width:15%; text-align: center;">기타</th>
                </tr>
                <?php
                    include ("../lib/db_conn.php");
                    $sql="select * from member order by id desc";
                    $result=mysqli_query($conn,$sql);
                    $total_record=mysqli_num_rows($result);
                    $list=10;
                    $block_cnt=5;
                    $block_num=ceil($page/$block_cnt);
                    $block_start=(($block_num-1)*$block_cnt)+1;
                    $block_end=$block_start + $block_cnt -1;

                    $total_page=ceil($total_record/$list);
                    if($block_end > $total_page){
                        $block_end=$total_page;
                    }

                    $total_block=ceil($total_page/$block_cnt);
                    $page_start=($page-1)*$list;

                    $sql2="select * from member order by id desc limit $page_start,$list";
                    $result2=mysqli_query($conn,$sql2);
                    while($re=mysqli_fetch_assoc($result2)){
                ?>
                    <tr>
                        <td><?=$re['userid']?></td>
                        <td><?=$re['userName']?></td>
                        <td><?=$re['address']?></td>
                        <td><?=$re['phoneNum']?></td>
                        <td><?=$re['email']?></td>
                        <td><?=$re['birthday']?></td>
                        <td><?=$re['joinDate']?></td>
                        <td>
                            <a href="#">수정</a><br>
                            <a href="./shop_delete.php?no=<?=$re['no']?>">삭제</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        
            <br>
            <!-- <div class="page_wrap">
            <div class="page_nation"> -->
            <div style="text-align:center; text-decoration:none;">
                <?php
                    if($page <=1 ){
                        //빈 값
                    }else{
                        echo "<a href='shop_list.php?page=1'>처음</a>";
                    }
                    for($i=$block_start; $i<=$block_end;$i++){
                        if($page == $i){
                            echo "<b> $i </b>";
                        }else{
                            echo "<a href='shop_list.php?page=$i'> $i </a>";
                        }
                    }

                ?>
            <!-- </div>-->
            </div> 
        </div>
    </section>
    <footer>
        <?php include "../lib/footer.php" ?>
    </footer>
</body>
</html>