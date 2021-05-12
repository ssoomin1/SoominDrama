<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자페이지</title>
   <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="../css_m/basic.css">
   <link rel="stylesheet" href="../css/index.css">
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
         <?php include "./header.php"?>
    </header>
    <section>
        <?php include "../lib/index2.php" ?>
    </section>
    <footer>
        <?php include "../lib/footer.php" ?>
    </footer>
</body>
</html>