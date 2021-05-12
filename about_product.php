<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>수민드라마</title>
   <!-- <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet"> -->
   <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./css/basic.css">
   <link rel="stylesheet" href="./css/about_product.css">
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
         <?php include "./lib/header.php"?>
    </header>
    <section>
        <div id="showall_box">
            <?php 
                include ('./lib/db_conn.php');
                $no=$_GET['no'];
                $sql="select * from product where no=$no";
                $result=mysqli_query($conn,$sql);
                $re=mysqli_fetch_assoc($result);

            ?>
            <input type="hidden" name="no" value="<?=$no?>">
            <div id="box_10"><img src="./product_img/<?=$re['img']?>"></div>
            <div id="box_10" style="border:1px solid #ccc;
            width:400px;margin-left:5%;margin-top:10%;height:400px;">
                <div id="item1">
                    <b><?=$re['name']?></b>
                    <hr><br>
                    <?=$re['comment']?> <br>
                    <p style="color:blue; font-size:20px;"><?=number_format($re['final_price'])?>원</p><br>
                </div>
                <div id="item1">
                    수량을 선택하세요:
                    <select name="count">
                        <option value="1">1개</option>
                        <option value="2">2개</option>
                        <option value="3">3개</option>
                        <option value="4">4개</option>
                        <option value="5">5개</option>
                        <option value="6">6개</option>
                        <option value="7">7개</option>
                        <option value="8">8개</option>
                        <option value="9">9개</option>
                        <option value="10">10개</option>
                    </select><br>
                </div>
                <div id="item2">
                    <button type="button" style="width: 52%; margin-left:24%;border-radius: 2px;cursor:pointer;">주문하기</button>
                </div>
            </div><br><br>
            <div id="item3"> 
                <img src="./product_info/<?=$re['info_img']?>" style="margin-top:1%; margin-left:10%;">
            </div>
        </div>
    </section>
    </section>
    <footer>
        <?php include "./lib/footer.php" ?>
    </footer>
</body>
</html>