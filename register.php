<?php
    session_start();
    include 'conn.php';

    if (isset($_POST['register'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        $phone = $_POST['phone'];
        $faculty = $_POST['faculty'];
        $canInsert = true;

        $filename = "images/" . $_FILES['image']['name'];
        $tmp = $_FILES['image']['tmp_name'];

        $res = mysqli_query($conn, "select * from members where email='{$email}' ");
        $row = mysqli_num_rows($res);
        
        if ($row > 0) {
            $_SESSION['msg'] = "Account already exist with email - $email";
            header("location: index.php");
        }else{
            $isImage = getimagesize($tmp);
            if($isImage){
                if(move_uploaded_file($tmp, $filename)){
                    $member_id = rand(time(), 1000000000);
                    // echo $member_id;
                    
                    $newTable = "Mem_".$member_id;

                    // // echo '$newTable';
                    // $sql = "INSERT INTO `members` (`id`, `name`, `faculty`, `email`, `password`, `image_id`, `phone`, `member_id`) VALUES (NULL, '$name', '$faculty', '$email', '$pwd', '$filename', '$phone', '$member_id')";
                    // // $sql = "INSERT INTO `members` (`id`, `name`, `faculty`, `email`, `password`, `image_id`, `phone`, `member_id`) VALUES (NULL, '$name', '$faculty', '$email', '$pwd', '$filename', '$phone', $member_id);
                    // //  CREATE TABLE if not exists $newTable ( `id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(100) NOT NULL , `email` VARCHAR(100) NOT NULL , `book_name` VARCHAR NOT NULL , `book_no` INT NOT NULL , `due_date` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`, `name`, `email`)) ENGINE = InnoDB;
                    // //     ";

                    $sql = "INSERT INTO `members` (`id`, `name`, `faculty`, `email`, `password`, `image_id`, `phone`, `member_id`) 
                    VALUES (NULL, '$name', '$faculty', '$email', '$pwd', '$filename', '$phone', $member_id);
                    CREATE TABLE if not exists $newTable (`book_id` INT NOT NULL , `book_name` varchar(100) , `due_date` varchar(100)) ENGINE = InnoDB;";
                    
                    $res = mysqli_multi_query($conn, $sql);
                    if($res){
                        $_SESSION['msg'] = "Your membership is created successfully, login to continue";
                        header("location: index.php");
                    }else{
                        $_SESSION['msg'] = "Sorry, something went wrong";
                    } 
                }
            }
        }

    } else {
        $_SESSION['msg'] = "Please, Enter data first!!!";
        header("location: reg_form.html");
    }
?>