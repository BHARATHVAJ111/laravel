<?php
ob_start();
session_start();
include("./include.php");
 $entry_url=$_SESSION['url'];
 $reg_url=$_SESSION['url1'];
 $user = 0;
 $success = 0;
if (isset($_POST['submit'])) {
    $username = $_POST['uname'];
    $password = $_POST['pwd'];
    $hashed_pwd=password_hash($password,PASSWORD_DEFAULT);

    $sql = "SELECT * FROM dictionary_registration where username='$username'";

    $run = mysqli_query($con, $sql);

    if ($run) {
        $num = mysqli_num_rows($run);
        if ($num > 0) {
            $user = 1;
        } else {
            $data = "INSERT INTO dictionary_registration (username,userpassword,entry_url,register_url)
            VALUES('$username','$hashed_pwd','$entry_url','$reg_url')";
            $result = mysqli_query($con, $data);

            if ($result) {
                $success = 1;
                header('location:./login.php');
                ob_end_flush();
            } else {
                echo "data not send " . $con->error;
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
    <title>signup page</title>
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <div class="container-fluied  pt-5 signup">
    <div class="container w-25 shadow">
        <div class="card mt-3 backstyle shadow">
            <h5 class="card-header text-center ">signup page</h5>
            <?php
            if ($user) {
                echo '<div class="alert alert-danger" role="alert">
                 oh sorry the username already exist
               </div>';
            }
            ?>
            <?php
            if ($success) {
                echo '<div class="alert alert-success" role="alert">
                you are successfully signup.
               </div>';
            }
            ?>
            <div class="card-body">
                <form action="" method="post">

                    <div class="mb-3">
                        <label>name</label>
                        <input type="text" class="form-control" placeholder="Enter your name" name="uname" required>
                    </div>
                    <div class="mb-3">
                        <label>password</label>
                        <input type="password" class="form-control" placeholder="Enter your password" name="pwd" required>
                    </div>
                    <input type="submit" value="signup" class="btn btn-primary" name='submit'>
                    <p>Already you have an account? <a href="./login.php" class="btn btn-success">login</a></p>
                </form>
            </div>
        </div>
    </div>

    </div>

    <script src="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js"></script>

</body>

</html>
