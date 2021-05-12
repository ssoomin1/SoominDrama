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
    <form method="post" action="shop_add.php" enctype="multipart/form-data">
        <p style="font-size:13px; font-weight: lighter; float:right; margin-right:5%;">홈 > 상품등록</p>
        <div id="login_box">
            
            <h3 style="text-align:center; font-weight: normal; margin-top:60px;"> 상품등록 </h3>
            <div id="add_box">
            <table style="margin-top:2%;">
                <tr>
                    <td style="text-align: center;"> 상품명</td>
                    <td><input type="text" name="name" style="width:90%;"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">상품소개</td>
                    <td><input type="text" name="comment" style="width:90%;"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">금액</td>
                    <td><input type="text" name="price"></td>
                </tr>
                <tr>
                    <td style="text-align:center;">총금액</td>
                    <td><input type="text" name="final_price"></td>
                </tr>
                <tr>
                    <td style="text-align: center;">상품설명</td>
                    <td><textarea name="memo" cols="50" rows="10" style="margin-left:2%;"></textarea></td>
                </tr>
                <tr>
                    <td style="text-align: center;">사진등록</td>
                    <td><input type="file" name="img" style="height:25px;"></td>
                </tr>
                <tr>
                    <td style="text-align:center;">상품설명(사진)</td>
                    <td><input type="file" name="info_img" style="height:25px;"></td>
                </tr>
            </table>
            <button type="submit" 
            style="background-color:pink; border:none;">등록하기</button>

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