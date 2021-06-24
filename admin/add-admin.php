<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>

        </br></br>
        <?php
        if (isset($_SESSION['add'])) {
            echo $_SESSION['add'];
            unset($_SESSION['add']); // removing session message

        }

        ?>

        <form action="" method="POST">

            <table class="tbl-30">

                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="Enter your name"></td>
                </tr>

                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>

                <tr>
                    <td colspan="2">

                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">


                    </td>

                </tr>
            </table>


        </form>


    </div>



</div>


<?php include('partials/footer.php') ?>

<?php


// Process the value from form and save it in database
// Check whether the submit button is clicked or not

if (isset($_POST['submit'])) {
    // Button clicked

    // Get the data from the form

    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']); //Password Encryption with MD5

    // SQL query to save data into database

    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";

    // Execute query and saving data into database
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    // Check whether the query is executed and data is inserted 
    if ($res == true) {
        $_SESSION['add'] = "<div class='success'>Admin Added Succesfully</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    } else {
        $_SESSION['add'] = "<div class='error'>Failed to Add Admin</div>";
        header('location:' . SITEURL . 'admin/manage-admin.php');
    }
}

?>