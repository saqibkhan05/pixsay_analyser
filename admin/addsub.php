<?php include 'header.php'; ?>
<div class="container">
    <br><br>
    <h1>Add New Subject.</h1>
    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
        <div class="form-group">
            <label>subject name</label>
            <input type="text" name="new_sub" class="form-control">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    include 'config.php';
    if (isset($_POST['submit'])) {
        $sub_name = $_POST['new_sub'];
        $sql = "INSERT INTO `subjects`(`sub_name`) VALUES ('{$sub_name}')";
        $run  = mysqli_query($conn, $sql) or die("sql error");
        if ($run) {
            echo "<script>
            Swal.fire(
                'Good job!',
                'You clicked the button!',
                'success'
              )
            </script>";
        } else {
            echo "error.....";
        }
    }
    ?>


    <br><br>
    <hr>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Eddit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $sql2 = "SELECT * FROM `subjects`";
            $run = mysqli_query($conn, $sql2) or die("sql2 error");
            if (mysqli_num_rows($run) > 0) {
                while ($data = mysqli_fetch_assoc($run)) {
            ?>
                    <tr>
                        <th><?php echo $data['sub_id'] ?></th>
                        <td><?php echo $data['sub_name'] ?></td>
                        <td>EDDIT</td>
                        <td>DELETE</td>
                    </tr>
            <?php
                }
            } else {
                echo '<br><div class="alert alert-danger" role="alert"> NO data in Database</div>';
            }
            ?>


        </tbody>
    </table>
</div>
<?php include 'footer.php'; ?>