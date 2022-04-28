<?php
   include 'conn.php';
 
   $book_id = rand(1000, 10000);
   $book_name = $_GET['book_name'];
   $tbl =  $_GET['tbl'];
 
   $res = mysqli_query($conn, "select * from Books where book_name = '{$book_name}' ");
 
   $row = mysqli_num_rows($res);
 
   mysqli_query($conn, "INSERT INTO $tbl (`book_id`, `book_name`, `due_date`) VALUES ('$book_id', '$book_name', '2022-05-05')");
 
   header("location: welcome.php");
?>