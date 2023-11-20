<?php
$word = '';
$image = '';
ob_start();
include("./include.php");
session_start();
$name = $_SESSION['name'];
$idval = $_SESSION['idget'];


if (isset($_GET['submit'])) {
    $getword = $_GET['values'];
    $sql = "SELECT * FROM dictionary_uploadfile where word='$getword' and (status=1 or username='$name') ";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($query);


    $word = $result['word'];
    $image = $result['imagefile'];
    $id = $result['id'];

    
    $_SESSION['getid'] = $id;
    $_SESSION['getword'] = $word;
    $_SESSION['img'] = $image;

    if ($result) {
        header("location:./$getword");
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
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style>
        h3 {
            color: white;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluied background signup">
        <div class="d-flex justify-content-between flex-wrap  pt-3 pb-2 fixed-top">
            <h3 class="ps-5">Dictionary</h3>
            <div class="d-flex justify-content-around gap-3  pe-5 ">
                <h3 class="text-warning">welcome
                    <?php

                    echo $name;
                    ?>
                </h3>

                <button class="btn btn-primary"><a href="./addword.php" class="text-white text-decoration-none fs-4 ">+</a></button><br>
                <button class="btn btn-danger"><a href="./logout.php" class="text-white text-decoration-none">logout</a></button>
            </div>
        </div>
        <div class="d-flex flex-column flex-wrap justify-content-center vh-100 align-items-center gap-3">

            <h3>search word here</h3>
            <form action="" method="get" class="d-flex flex-column gap-3 flex-wrap">
                <input type="text" class="w-100 rounded p-2" name="values" required>
                <input type="submit" value="search" class="btn btn-dark w-50 ms-5" name="submit">
            </form>

        </div>
    </div>




    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>
