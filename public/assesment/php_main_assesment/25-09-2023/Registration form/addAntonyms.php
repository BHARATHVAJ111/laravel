<?php
$run='';
session_start();
include("./include.php");
$array_emp= [];
if (isset($_POST['submit'])) {
    $id = $_GET['getid'];
    $data = $_POST['ant'];

    array_push($array_emp, $data);
    $storing = json_encode($array_emp);


    $sql1 = "SELECT * FROM dictionary_uploadfile where id='$id'";


    $query = mysqli_query($con, $sql1);

    $result = mysqli_fetch_array($query);

    $getant = $result['antonyms'];
   

   

    if ($getant == NULL) {
        $sql2 = "UPDATE dictionary_uploadfile set antonyms='$storing' where id='$id'";
        $querys = mysqli_query($con, $sql2);
    } else {
        $data = json_decode($getant, true);


        foreach ($array_emp as $values) {
            array_push($data, $values);
        }

        $encodedata = json_encode($data);
        print_r($encodedata);
        $sql = "UPDATE dictionary_uploadfile set antonyms='$encodedata' where id='$id'";

        $run = mysqli_query($con, $sql);
       
    }

}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Antonyms</title>
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <style> 
        h3{
            color: white;;
            font-weight: bold;
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluied syn">
        <div class="d-flex justify-content-between flex-wrap  pt-3 pb-2 fixed-top">
            <h3 class="ps-5">Dictionary</h3>
            <div class="d-flex justify-content-around gap-3  pe-5 ">

                <button class="btn btn-danger"><a href="./login.php" class="text-white text-decoration-none">login</a></button>
                <button class="btn btn-primary"><a href="./signup.php" class="text-white text-decoration-none">register</a></button>
            </div>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center gap-3 vh-100 contain_search2">
            <h3>Add Antonyms here</h3>
            <form action="" method="post" class="d-flex flex-column gap-2">
                <input type="text" class="w-100 p-2 rounded " name="ant" placeholder="Enter antonyms here">
                <input type="submit" class="btn btn-dark w-25" name="submit" value="Add">
            </form>
        </div>
    </div>



    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>