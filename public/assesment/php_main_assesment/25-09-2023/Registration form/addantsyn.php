<?php
session_start();
include("./include.php");

if (isset($_POST['synant'])) {
    $wordid = $_POST['wordid'];
    $word = $_POST['word'];
    $option = $_POST['option'];

    

    if ($option == 'synonyms') {
        $array = [];
       

            array_push($array, $word);
            $storing = json_encode($array);

            $sql1 = "SELECT * FROM dictionary_uploadfile where id='$wordid'";

            $query = mysqli_query($con, $sql1);

            $result = mysqli_fetch_array($query);

            $getsyn = $result['synonyms'];


            if ($getsyn == NULL) {
                $sql2 = "UPDATE dictionary_uploadfile set synonyms='$storing' where id='$wordid'";
                $querys = mysqli_query($con, $sql2);
            } else {
                $data = json_decode($getsyn, true);


                foreach ($array as $values) {
                    array_push($data, $values);
                }

                $encodedata = json_encode($data);
                print_r($encodedata);
                $sql = "UPDATE dictionary_uploadfile set synonyms='$encodedata' where id='$wordid'";

                $run = mysqli_query($con, $sql);
                echo "data wants to enter";
            }
        } elseif ($option == 'antonyms') {
            $array_emp = [];
           

                array_push($array_emp, $word);
                $storing = json_encode($array_emp);


                $sql1 = "SELECT * FROM dictionary_uploadfile where id='$wordid'";


                $query = mysqli_query($con, $sql1);

                $result = mysqli_fetch_array($query);

                $getant = $result['antonyms'];




                if ($getant == NULL) {
                    $sql2 = "UPDATE dictionary_uploadfile set antonyms='$storing' where id='$wordid'";
                    $querys = mysqli_query($con, $sql2);
                } else {
                    $data = json_decode($getant, true);


                    foreach ($array_emp as $values) {
                        array_push($data, $values);
                    }

                    $encodedata = json_encode($data);
                    print_r($encodedata);
                    $sql = "UPDATE dictionary_uploadfile set antonyms='$encodedata' where id='$wordid'";

                    $run = mysqli_query($con, $sql);
                    echo "data wants to enter";
                }
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
            font-size: 40px;
        }
    </style>
</head>

<body>
    <div class="container-fluied synant ">
        <div class="mt-3 p-5 fixed-top">
            <a href="./adminpanel.php" class="btn btn-danger m-5 ">Back</a>
        </div>
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 vh-100 flex-wrap contain_search2">
            <h3>Add Synonyms /Antonyms here</h3>
            <form action="" method="post" class="d-flex flex-column gap-3  ">
                <input type="text" class="w-100 rounded p-2" placeholder="Enter the word id" name="wordid">
                <input type="text" class="w-100 rounded p-2" placeholder="Enter the word" name="word">
                <select class="w-100 p-1" name="option">
                    <option>choose a file</option>
                    <option value="synonyms">synonyms</option>
                    <option value="antonyms">antonyms</option>
                </select>
                <input type="submit" name="synant" value="Add" class="btn btn-dark">
            </form>
        </div>
    </div>




    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>