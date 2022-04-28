<?php
    session_start();
?>

<title>Login Form</title>
<link rel="stylesheet" href="style.css">

<div class="container">

    <div class="msg_holder">
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                session_unset();
            } else {
                echo "Please login to continue!!";
            }
        ?>
    </div>
    
    <div class="form_holder">
        <form action="login_check.php" method="post">
            <table align="center">
                <tr>
                    <td>Email</td>
                    <td><input type="text" name="email" value="<?php if(isset($_COOKIE['rem_user'])){echo $_COOKIE['rem_user'];} ?>" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="pwd" value="<?php if(isset($_COOKIE['rem_user'])){echo $_COOKIE['rem_pass'];} ?>" required autocomplete="off"></td>
                </tr>

                <tr>
                    <td align="right"><input type="checkbox" name="rem" <?php if(isset($_COOKIE['rem_user'])){echo "checked";} ?>></td>
                    <td>Remember Me</td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="Login" name="login">
                    </td>
                </tr>
        
                <tr>
                    <td colspan="2" align="center">
                        New Member ? <a href="reg_form.php">Register Here</a>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>