<?php
    include 'conn.php';

    $name = $_GET['book_name'];
    $tbl = $_GET['tbl'];

    mysqli_query($conn, "delete from $tbl where book_name = '$name' ");
    header("location: welcome.php");
?>