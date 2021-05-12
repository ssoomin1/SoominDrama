<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자페이지</title>
   <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../css_m/basic.css">
   <link rel="stylesheet" href="../css_m/add_l.css"> 

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
        <p style="font-size:13px; font-weight: lighter; float:right; margin-right:5%;">홈 > 상품등록</p>
        <div id="login_box">
            <h3 style="text-align:center; font-weight: normal; margin-top:20px;"> 상품등록 </h3>
            <div id="add_box">
            <table style="margin-top:2%;">
                <tr>
                    <th style="width:25%; text-align: center;"> 상품명</td>
                    <th style="width:45%; text-align: center;">상품이미지</td>
                    <th style="width:15%; text-align: center;">가격</td>
                    <th style="width:15%; text-align: center;">기타</td>
                </tr>
                <?php
                    include ("../lib/db_conn.php");
                    $sql="select * from product order by no desc";
                    $result=mysqli_query($conn,$sql);
                    $total_record=mysqli_num_rows($result);
                    $list=4;
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

                    $sql2="select * from product order by no desc limit $page_start,$list";
                    $result2=mysqli_query($conn,$sql2);
                    while($re=mysqli_fetch_assoc($result2)){
                ?>
                    <tr>
                        <td><?=$re['name']?></td>
                        <td><img src="../product_img/<?php echo $re['img']?>" style="height:100px;"></td>
                        <td><?=$re['price']?></td>
                        <td>
                            <a href="./edit_form.php?no=<?=$re['no']?>">수정</a><br>
                            <a href="./shop_delete.php?no=<?=$re['no']?>">삭제</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
           

            <button type="submit" 
            style="background-color:pink; border:none;"
            onclick="location.href='./add_form.php'">상품추가</button>
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