<?php
ob_start();
session_start();
$word = '';
$image = '';
$url = '';
include("./include.php");

//get url

$get_url=$_SERVER['REQUEST_URI'];
$_SESSION['url']=$get_url;

if (isset($_GET['submit1'])) {

    $getwords = $_GET['value'];

    $sql1 = "SELECT * FROM dictionary_uploadfile where word='$getwords' and status=1";

    $run = mysqli_query($con, $sql1);

    $result = mysqli_fetch_array($run);

    $word = $result['word'];
    $image = $result['imagefile'];


    $id = $result['id'];


    $_SESSION['getid'] = $id;
    $_SESSION['img'] = $image;


    if ($result) {
        $success = 1;
        header("location:./$getwords");
        ob_end_flush();
    } else {
        header("location:./errorpage.php");
        ob_end_flush();
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index page</title>
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        h3{
            color: white;
            font-weight: bold;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluied background signup">
        <div class="d-flex justify-content-between flex-wrap  pt-3 pb-2 fixed-top">
            <h3 class="ps-5">Dictionary</h3>
            <div class="d-flex justify-content-around gap-3  pe-5 ">

                <button class="btn btn-danger"><a href="./login.php" class="text-white text-decoration-none">login</a></button>
                <button class="btn btn-primary"><a href="./signup.php" class="text-white text-decoration-none">register</a></button>
            </div>
        </div>
        <div class="d-flex flex-column flex-wrap justify-content-center vh-100 align-items-center gap-3">

            <h3>search word here</h3>
            <form action="" method="get" class="d-flex flex-column gap-3 flex-wrap">
                <input type="text" class="w-100 rounded p-2" name="value" required>
                <input type="submit" value="search" class="btn btn-dark w-50 ms-5" name="submit1">
            </form>

        </div>
    </div>

    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>