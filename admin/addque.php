<?php include 'header.php'; ?>
<div class="container">
    <br><br>
    <h1>chose sunject</h1>
    <hr>
    <br>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Subject ID</th>
                <th scope="col">Subject name</th>
                <th scope="col">Add Question</th>
            </tr>
        </thead>
        <tbody>

            <?php
            include 'config.php';
            $sql2 = "SELECT * FROM `subjects`";
            $run = mysqli_query($conn, $sql2) or die("sql2 error");
            if (mysqli_num_rows($run) > 0) {
                while ($data = mysqli_fetch_assoc($run)) {
            ?>
                    <tr>
                        <th><?php echo $data['sub_id'] ?></th>
                        <td><?php echo $data['sub_name'] ?></td>
                        <td><a href="addnewque.php?id=<?php echo $data['sub_id'] ?>" class="btn btn-primary">Add Question</a></td>
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