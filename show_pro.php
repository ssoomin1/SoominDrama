<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상품보기</title>
   <!-- <link href="https://fonts.googleapis.com/css2?family=Gothic+A1:wght@300&display=swap" rel="stylesheet"> -->
   <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="./css/basic.css">
   <link rel="stylesheet" href="./css/show_p.css">
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
        <?php
            include ("./lib/db_conn.php");
            $sql="select * from product order by no desc";
            $result=mysqli_query($conn,$sql);

            $page_num=20;
            if(!$start){
                $start=0;
            }

            $sql="select count(*) as cnt from product";
            $result=mysqli_query($conn,$sql);
            $re=mysqli_fetch_assoc($result);
            $total=$re['cnt'];
        ?>
        <p><h1 style="text-align:center;">상품목록</h1></p>
            <table>
                <?php
                    $sql2="select * from product order by no desc limit $start,$page_num";
                    $result=mysqli_query($conn,$sql2);
                    $i;
                     while($data=mysqli_fetch_assoc($result)){ 
                ?>
                
                <td style="text-align:center;">
                <div id="imgbox">
                    <a href="about_product.php?no=<?=$data['no']?>">
                    <img src="./product_img/<?=$data['img']?>">
                    </a>
                </div>
                <div id="textbox">
                    <a href="about_product.php?no=<?=$data['no']?>"><?=$data['name']?></a> 
                </div>
                <div id="pricbox">
                    <strike><?=number_format($data['price'])?>원 </strike> <br>
                    <font style="color:#0066FF; font-size:15px;"><?=number_format($data['final_price'])?>원</font>
                </div> 
                </td>

                <?php
                    $i++;
                    if(($i%4)==0){?>
                    </tr><br><tr>
                <?php }
                }
                ?>

                </table><br>
                
                <?php
                    $pages=$total/$page_num;
                    for($i=0;$i<$pages;$i++){
                        $assa=$page_num * $i;
                        $j=$i+1;
                        echo "<a href=$PHP_SELF?start=$assa style='margin-left:45%;'> $j </a>";
                    }
                ?>
    </section>
    <footer>
        <?php include "./lib/footer.php" ?>
    </footer>
</body>
</html>