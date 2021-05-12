<?php
    $cname=$_POST['company_name']; 
    $interest=$_POST['interest'];
    $meet=$_POST['meet'];
    $count=$_POST['count'];
    $name=$_POST['name'];
    $degree=$_POST['degree'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];

    include ('./dbconn.php');

    $insertQ = "insert into company(company_name,interest,meet,count,name,degree,tel,email)
                values('$cname','$interest','$meet','$count','$name','$degree','$tel','$email')";
    mysqli_query($conn,$insertQ);
    mysqli_close($conn);

    echo("<script>
    alert('신청이 완료되었습니다.');
    location.href='./2209신수민.html';
    </script>");
?>