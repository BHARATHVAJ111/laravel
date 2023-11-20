<?php
include("./include.php");
session_start();
if (isset($_POST['submit'])) {
   $getname=$_POST['word'];
    $image = $_FILES['file'];
    $username=$_SESSION['name'];
    $id=$_SESSION['idget'];
    $name = $image['name'];
    $type = $image['type'];
    $tmp_name = $image['tmp_name'];
    $error = $image['error'];
    $separate = explode('.', $name);
    //  $separate_extention=$separate[1];     OR
    $separate_extention = strtolower(end($separate));
    //  print_r($separate_extention);
    $extention_array = array('jpeg', 'jpg', 'png', 'jfif');
    if (in_array($separate_extention, $extention_array)) {
      $upload_image = "./img/" . $name;
      move_uploaded_file($tmp_name, $upload_image);
    }
    

    $fileinsert="INSERT INTO dictionary_uploadfile (imagefile,word,username,userid)
    VALUES('$upload_image','$getname','$username','$id')";
    $result = mysqli_query($con, $fileinsert);
    

    if (!$result) {
      die("data not inserted".$con->error);
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
       
        h3{
        
            font-weight: bold;
            font-size: 30px;
        }
    </style>
</head>

<body>
    <div class="container-fluied add_word">
        <div class="d-flex justify-content-between flex-wrap  pt-3 pb-2 fixed-top">
            <h3 class="ps-5">Dictionary</h3>
            <div class="d-flex justify-content-around gap-3  pe-5 ">
                <button class="btn btn-danger"><a href="./login.php" class="text-white text-decoration-none">login</a></button>
                <button class="btn btn-warning"><a href="./signup.php" class="text-white text-decoration-none">register</a></button>
                <button class="btn btn-primary"><a href="./page_one.php" class="text-white text-decoration-none">Go_home</a></button>

            </div>
        </div>

        <form action="" method="post" enctype="multipart/form-data">
            
            <div class=" vh-100  d-flex flex-column justify-content-center align-items-center ">
            <h3>Enter a word here</h3>
                <input type="text" name="word" placeholder="Enter a word" class="w-25 rounded p-2"><br>

                <div class="d-flex flex-column gap-2">
                    <input class="form-control w-100 p-2 border-dark border-2" type="file" id="" name="file" required>
                    <input type="submit" name="submit" value="Add" class="w-25 btn btn-dark"> 
                </div>
            </div>

        </form>
    </div>



    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>