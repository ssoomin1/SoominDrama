<?php
    session_start();
    session_destroy();
    echo "<script>location.href='../index_3.php';</script>";
?>