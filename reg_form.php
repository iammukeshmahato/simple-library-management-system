
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="msg_holder">
            <?php
                if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    session_unset();
                } else {
                    echo "New Member Registration";
                }
            ?>
        </div>

        <div class="form_holder">
            <form action="register.php" method="post" enctype="multipart/form-data">
                <table align="center">
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="name" placeholder="Enter your full name" required></td>
                    </tr>
                    <tr>
                        <td>Email:</td>
                        <td><input type="email" name="email" placeholder="Enter your email" required></td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td>Phone No:</td>
                        <td><input type="tel" name="phone" placeholder="Enter contact number" required></td>
                    </tr>
                    <tr>
                        <td>Faculty:</td>
                        <td>
                            <select name="faculty" required>
                                <option value="DIT">DIT</option>
                                <option value="DCE">DCE</option>
                                <option value="DEE">DEE</option>
                                <option value="DGE">DGE</option>
                                <option value="DHM">DHM</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Photo:</td>
                        <td><input type="file" name="image" required></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Register" name="register"></td>
                        <td><input type="reset" value="Reset"></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</body>
</html>