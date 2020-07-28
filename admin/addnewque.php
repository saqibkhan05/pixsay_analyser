<?php include 'header.php'; ?>
<div class="container">
    <?php
    $sub_id = $_GET['id'];
    include 'config.php';
    $sql = "SELECT * FROM `subjects` WHERE Sub_id = '{$sub_id}' ";
    $run = mysqli_query($conn, $sql) or die("sql1 error");
    $data = mysqli_fetch_assoc($run);
    ?>

    <h1>Add new question</h1>
    <hr>


    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-row">
            <div class="col">
                <label>Time zone</label>
                <select name="time_zone" class="form-control">
                    <optgroup label="July">
                        <option value="July 2011" selected>July 2011</option>
                        <option value="July 2012">July 2012</option>
                        <option value="July 2013">July 2013</option>
                        <option value="July 2014">July 2014</option>
                        <option value="July 2015">July 2015</option>
                        <option value="July 2016">July 2016</option>
                        <option value="July 2017">July 2017</option>
                        <option value="July 2018">July 2018</option>
                    </optgroup>
                    <optgroup label="December">
                        <option value="Dec 2011">December 2011</option>
                        <option value="Dec 2012">December 2012</option>
                        <option value="Dec 2013">December 2013</option>
                        <option value="Dec 2014">December 2014</option>
                        <option value="Dec 2015">December 2015</option>
                        <option value="Dec 2016">December 2016</option>
                        <option value="Dec 2017">December 2017</option>
                        <option value="Dec 2018">December 2018</option>
                    </optgroup>
                </select>
            </div>
            <div class="col">
                <label>Question No.</label>
                <input type="text" name="q_n" class="form-control">
            </div>
            <div class="col">
                <label>Question Part</label>
                <input type="text" name="q_p" class="form-control">
            </div>
            <div class="col">
                <label>Question Marks</label>
                <input type="text" name="q_m" class="form-control">
            </div>
        </div>
        <br>
        <div class="form-row">
            <div class="col">
                <label>Subject</label>
                <input type="text" value="<?php echo $data['sub_name'] ?>" readonly class="form-control">
            </div>
            <div class="col">
                <label>Block No.</label>
                <input type="text" name="B_n" class="form-control">
            </div>
            <div class="col">
                <label>Unit Part</label>
                <input type="text" name="U_n" class="form-control">
            </div>
            <div class="col">
                <label>Question Tag</label>
                <input type="text" name="q_t" class="form-control">
            </div>
        </div>
        <br>
        <div>
            <label>Question</label>
            <textarea name="q" class="form-control" rows="6"></textarea>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $time = $_POST['time_zone'];
        $q_n = $_POST['q_n'];
        $q_p = $_POST['q_p'];
        $q_m = $_POST['q_m'];
        $B_n = $_POST['B_n'];
        $U_n = $_POST['U_n'];
        $q_t = $_POST['q_t'];
        $q = $_POST['q'];

        $addsql = "INSERT INTO `questions`(`subject`, `time_zone`, `q_no`, `q_p`, `marks`, `block`, `unit`, `tag`, `question`) VALUES ({$sub_id},'{$time}',{$q_n},'{$q_p}',{$q_m},{$B_n},{$U_n},'{$q_t}','{$q}')";
        $run2 = mysqli_query($conn, $addsql) or die("add saqli error");
        if ($run2) {
            echo "ok";
        } else {
            echo "not ok";
        }
    }
    ?>



</div>
<?php include 'footer.php'; ?>