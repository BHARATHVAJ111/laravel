<?php
ob_start();
$username = '';
$password = '';
$pwd = '';
$run = '';
$error='';

include("./include.php");
session_start();
if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];

    $_SESSION['name'] = $username;

    $sql = "SELECT * FROM dictionary_registration where username ='$username'";
    $run = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($run)) {
        $pwd = $row['userpassword'];
        $id=$row['id'];
        $admin=$row['is_admin'];
        $_SESSION['idget'] = $id;
        
    };
    
    $error= '<div class="alert alert-danger text-center text-uppercase fs-5" role="alert">
    invalid username or password.
   </div>';

    if ($pwd_decript = password_verify($password, $pwd)) {

        if ( $admin == 1) {
            header("location:./adminpanel.php");
            ob_end_flush();
        } else {
            if ($run = mysqli_query($con, $sql)) {
                $num = mysqli_num_rows($run);
                if ($num < 0) {
                   echo "error";
                } 
                    echo '<div class="alert alert-success" role="alert">
                    you are successfully login.
               </div>';
                    header("location:./page_one.php");
                    ob_end_flush();
                
            }
            
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login page</title>
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="./assets/images/dictionary_images.jfif" class="rounded-circle">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
   <div class="container-fluied pt-5 signup">
   <div class="container w-25 shadow login">
        <button class="btn btn-success "><a href="./signup.php" class="text-light text-decoration-none">register</a></button>
        <div class=" mt-3 border p-5 rounded bg-light shadow ">
            <h5 class=" text-center">User login</h5>
            <div class=" ">
                <form action="" method="post">

                    <div class="mb-3">
                        <label>Name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" name="uname" value="<?php echo $username; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label>Password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="pwd" value="<?php echo $password; ?>" required>
                    </div>


                    <input type="submit" value="login" class="btn btn-primary mb-3" name='submit'>
                    <!-- <button class="btn btn-primary" type="submit" name="submit"><a href="./home.php?getid=" class="text-white">login</a></button> -->
                    <?php 
                    echo "<br>";echo $error;?>


                </form>
            </div>
        </div>
    </div>
   </div>


    <script src="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js"></script>

</body>

</html>