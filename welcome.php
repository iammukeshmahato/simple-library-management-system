<?php
include_once 'conn.php';
session_start();
if(!isset($_SESSION['isLogin'])){
   header("location: login_form.php");
}
    $email = $_SESSION['email'];
    // session_unset();
    $data = mysqli_fetch_assoc(mysqli_query($conn,"select * from members where email='$email' "));
    $mem_id = "Mem_".$data['member_id'];
?>

<title>Welcome </title>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <!-- <li class="nav-item active">
            <a class="nav-link">Home <span class="sr-only">(current)</span></a>
        </li> -->
            <li class="nav-item">
                <a class="nav-link" onclick="showMyBooks()" href="#">My Books</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#"  onclick="showAvailableBooks()">Get Books</a>
            </li>

        </ul>
        <!-- <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>

<div class="welcom_container">
    <div class="image_container">
        <img src="<?php echo $data['image_id']?>">
    </div>

    <br>

    <h3 id="welcome">Welcome <?php echo $data['name']?></h3>

    <a href="logout.php">Log Out</a><br>

    <div class="booklist">

        <table>
            <tr>
                <th colspan="5">My Books</th>
            </tr>
            
            <tr>
                <th>S.N</th>
                <th>Books</th>
                <th>Book No</th>
                <th colspan="2">Due Date</th>
            </tr>

            <?php
                $res = mysqli_query($conn, "SELECT * FROM $mem_id ");
                $row = mysqli_num_rows($res);
                if($row > 0){
                    $sn = 1;
                    while($data = mysqli_fetch_assoc($res)){?>
                        <tr>
                            <td><?php echo $sn?></td>
                            <td><?php echo $data['book_name']; ?></td>
                            <td><?php echo $data['book_id']; ?></td>
                            <td><?php echo $data['due_date']; ?></td>
                            <td><a href="return.php?tbl=<?php echo $mem_id; ?> && book_name=<?php echo $data['book_name']; ?>" onclick="return confirm('Are your sure to return ?')"> Return </a></td>
                        </tr>
                        <?php $sn++;
                    }
                }else{?>
                    <tr><td colspan="4">You have not taken any books from Library.</td></tr>
                <?php }
            ?>
    
        </table>
    </div>

    <div class="getBook">
        <table>
            <tr>
                <th colspan="5">Available Books</th>
            </tr>

            <tr>
                <th>S.N</th>
                <th colspan="2">Book Name</th>
            </tr>

            <?php
                $res = mysqli_query($conn, "SELECT * FROM Books");
                $row = mysqli_num_rows($res);
                if($row > 0){
                    $sn = 1;
                    while($data = mysqli_fetch_assoc($res)){?>
                        <tr>
                        <td><?php echo $sn?></td>
                        <td><?php echo $data['book_name'];?></td>
                        <td><a href="getBook.php?book_name=<?php echo $data['book_name']; ?> && tbl=<?php echo $mem_id; ?>">Get Book</a> </td>
                        </tr>
                        <?php $sn++;
                    }
                }
            ?>
        </table>
    </div>

</div>
<script src="./welcome.js"></script>