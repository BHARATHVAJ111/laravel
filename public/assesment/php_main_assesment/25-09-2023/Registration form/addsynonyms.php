<?php
ob_start();
$run='';
session_start();
include("./include.php");
$array = [];
if (isset($_POST['submit'])) {
    $id = $_GET['getid'];
   
    $data = $_POST['syn'];
  
    array_push($array, $data);  
    $storing = json_encode($array);


    $sql1 = "SELECT * FROM dictionary_uploadfile where id='$id'";


    $query = mysqli_query($con, $sql1);

    $result = mysqli_fetch_array($query);

    $getsyn = $result['synonyms'];
 

    if ($getsyn == NULL) {
        $sql2 = "UPDATE dictionary_uploadfile set synonyms='$storing' where id='$id'";
        $querys = mysqli_query($con, $sql2);
    } else {
        $data = json_decode($getsyn, true);

        foreach ($array as $values) {
            array_push($data, $values);
            
        }

        $encodedata = json_encode($data);
        print_r($encodedata);
        $sql = "UPDATE dictionary_uploadfile set synonyms='$encodedata' where id='$id'";

        $run = mysqli_query($con, $sql);
        echo "data wants to enter";
    }

    if($run){
        header("location:./addsynonyms.php");
        ob_end_flush();
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Synonyms</title>
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
            <h3>Add Synonyms here</h3>
            <form action="" method="post" class="d-flex flex-column gap-2 ">
                <input type="text" class="w-100 p-2 rounded " name="syn" placeholder="Enter synonyms here">
                <input type="submit" class="btn btn-dark w-25" name="submit" value="Add">
            </form>
        </div>
    </div>



    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>