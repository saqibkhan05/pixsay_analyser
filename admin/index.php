<?php
session_start();
if (isset($_SESSION['username'])) {
    header("location: http://localhost/web/saqib/admin/home.php");
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container">
        <br><br>
        <hr>
        <h1>login..</h1>
        <br>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">

            <div class="form-group">
                <label>Username</label>
                <input type="text" name="uname" class="form-control">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="pass" class="form-control">
            </div>

            <button type="submit" name='login' class="btn btn-primary">Submit</button>
            <a href="../" class="btn btn-danger">Cancel</a>
        </form>
    </div>

    <?php
    if (isset($_POST['login'])) {
        include 'config.php';
        $name = $_POST['uname'];
        $pass = $_POST['pass'];
        $sql = "SELECT * FROM `users` WHERE name = '{$name}' and password = '{$pass}'";
        $run = mysqli_query($conn, $sql) or die("sql error");
        if (mysqli_num_rows($run) > 0) {
            $row = mysqli_fetch_assoc($run);
            session_start();
            $_SESSION['username'] = $row['name'];
            header('location: http://localhost/web/saqib/admin/home.php');
        } else {
            echo '<div class="alert alert-danger" role="alert">your login username or password is incorrect</div>';
        }
    }
    ?>



    <?php include 'footer.php'; ?>