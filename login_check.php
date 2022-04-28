<?php
    session_start();
    include_once 'conn.php';
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $pass = $_POST['pwd'];

        $res = mysqli_query($conn, "SELECT email, password from mydb.members where email='$email' ");
        if(mysqli_num_rows($res) > 0){
            $data = mysqli_fetch_assoc($res);
        }
        // echo "email = $email<br>";
        // echo "data = ".$data['password'];
        if ($email == $data['email'] && $pass == $data['password']) {
            
            if (isset($_POST['rem'])) {
                setcookie("rem_user", $email, time()+60*60);
                setcookie("rem_pass", $pass, time()+60*60);
            }else {
                setcookie("rem_user", $email, time()-60*60);
                setcookie("rem_pass", $pass, time()-60*60);
            }
            $_SESSION['email'] = $email;
            $_SESSION['isLogin'] = "true";
            header("location: welcome.php");
        }else {
            $_SESSION['msg'] = "Invailed Username/Password";
            header("location: index.php");
        }
    }else {
        $_SESSION['msg'] = "Please login first to continue";
        header("location: index.php");
    }
?>