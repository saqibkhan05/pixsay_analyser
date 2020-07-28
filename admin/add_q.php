<?php include 'header.php'; ?>
<div class="container">
    <br><br>
    <hr>
    <h2>Add New User..</h2>
    <br>

    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="fname" class="form-control">
        </div>

        <div class="form-group">
            <label>Last name</label>
            <input type="text" name="lname" class="form-control">
        </div>

        <div class="form-group">
            <label>Username</label>
            <input type="text" name="uname" class="form-control">
        </div>

        <div class="form-group">
            <label>User role</label>
            <select class="form-control" name="urole">
                <option value="0">Normal user</option>
                <option value="1">Admin</option>
            </select>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input type="password" name="pass" class="form-control">
        </div>

        <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </form>
    <hr>

</div>
<?php include 'footer.php'; ?>