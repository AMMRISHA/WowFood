<?php 
include('partials/menu.php');
?>

<link rel="stylesheet" href="admin.css">
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br/>
        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" placeholder="enter your name"></td>
                </tr>

                <tr>
                    <td>Username</td>
                    <td><input type="text" name="username" placeholder=" your user name"></td>
                </tr>

                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" placeholder="your password"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-primary">
                    </td>
                </tr>

            </table>
        </form>
    </div>
</div>




<?php
    include("partials/footer.php");
?>



<?php
//Process the value from form and save it Database

if(isset($_POST['submit']))
{
    //get data from form
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //save data into database
    $sql = "INSERT INTO tbl_admin SET
        full_name='$full_name',
        username='$username',
        password='$password'
    ";
    $res = mysqli_query($conn, $sql) or die(mysqli_error());
    if($res==TRUE)
    {
        $_SESSION['add'] = "Admin Added Successfully";
        header("location:".SITEURL.'admin/manage-admin.php');
    }
    else{
        $_SESSION['add'] = "Admin Not Added";
        header("location:".SITEURL.'admin/add-admin.php');
    }
}
?>