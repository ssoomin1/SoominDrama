<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자페이지</title>
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css_m/basic.css">
    <link rel="stylesheet" href="../css_m/add_f.css">
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
        <?php include "../manager/header.php" ?>
    </header>
    <section>
    <?php 
        include ("../lib/db_conn.php"); 
        $no=$_GET['no'];
        $sql = "select * from product where no=$no";
        $result=mysqli_query($conn,$sql);
        $re=mysqli_fetch_array($result);
        //no=<?php echo $re[0]
    ?>
    <form method="post" action="shop_edit.php" enctype="multipart/form-data">
    <input type="hidden" name="no" value="<?=$no?>">
    <input type="hidden" name="old_name" value="<?php echo $re['img']?>">
        <p style="font-size:13px; font-weight: lighter; float:right; margin-right:5%;">홈 > 상품수정</p>
        <div id="login_box">
            <h3 style="text-align:center; font-weight: normal; margin-top:60px;"> 상품수정 </h3>
            <div id="add_box">
            <table style="margin-top:2%;">
                <tr>
                    <td style="text-align: center;"> 상품명</td>
                    <td><input type="text" name="name" style="width:90%;" value="<?=$re['name']?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">상품소개</td>
                    <td><input type="text" name="comment" style="width:90%;" value="<?=$re['comment']?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">금액</td>
                    <td><input type="text" name="price" value="<?=$re['price']?>"></td>
                </tr>
                <tr>
                    <td style="text-align:center;">총금액</td>
                    <td><input type="text" name="final_price" value="<?=$re['final_price']?>"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">상품설명</td>
                    <td><textarea name="memo" cols="50" rows="10" style="margin-left:2%;"><?=$re['memo']?></textarea></td>
                </tr>
                <tr>
                    <td style="text-align: center;">사진등록</td>
                    <td>
                        <img src="../product_img/<?=$re['img']?>" style="height:100px;">  <br> 
                        <input type="file" name="img" style="height:25px;">
                    </td>
                </tr>
                 <tr>
                    <td style="text-align: center;">상품설명(사진)</td>
                    <td>
                        <img src="../product_info/" style="height:100px;">  <br> 
                        <input type="file" name="info_img" style="height:25px;">
                    </td>
                </tr> 
            </table>
            <button type="submit" 
            style="background-color:pink; border:none;">수정하기</button>

            <button type="submit" 
                style="background-color:rgb(252, 210, 217); border:none; margin-left:5%;"
                onclick="location.href='shop_list.php'">
                취소하기</button>
            </div>
        </div>
        </form>
    </section>
    <footer>
         <?php include "../lib/footer.php" ?>
    </footer>
    </body>
</html>