<?php
ob_start();
session_start();
include("./include.php");

if(isset($_SESSION['name'])){
    $name=$_SESSION['name'];
    header("loaction:./adminpanel.php");
}else{
    header("location:./index.php");
    ob_end_flush();
}




if (isset($_POST['submit'])) {
    $data = $_POST['approve'];

    $sql = "UPDATE dictionary_uploadfile SET status=1 where id='$data'";
    $query = mysqli_query($con, $sql);
}


if (isset($_POST['submit1'])) {
    $data = $_POST['disapprove'];

    $sql = "UPDATE dictionary_uploadfile SET status=0 where id='$data'";
    $query = mysqli_query($con, $sql);
}

if (isset($_POST['submit2'])) {
    $data = $_POST['delete'];


    $sql = "SELECT * FROM dictionary_uploadfile where id='$data'";
    $query = mysqli_query($con, $sql);
    if (mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_array($query)) {
            $image = $result['imagefile'];
        }
    };

    $sql1 = "DELETE FROM dictionary_uploadfile where id='$data'";
    $run = mysqli_query($con, $sql1);
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

</head>

<body>
    <div class="container-fluied admin">
        <div class="d-flex justify-content-around gap-3 bg-dark bg-gradient text-light p-3 anger flex-wrap">
            <h4 class="text-info">ADMIN PANEL</h4>
            <h4><a href="./addword.php" class="a1">ADD WORD</a></h4>
            <h4><a href="./addantsyn.php" class="a2">ADD SYNONYMS / ANTONYMS</a></h4>
            <h4><a href="./adminpanel.php" class="a3">WORDS TABLE</a></h4>
            <h4><a href="./comment.php" class="a4">COMMENTS TABLE</a></h4>
            <button class="btn btn-danger"><a href="./logout.php" class="text-decoration-none text-white">logout</a></button>
        </div>
        <div>
            <h2 class="text-center text-uppercase pt-3 text-white">words table</h2>
            <hr>
        </div>
        <table class="table border border-white container bg-dark shadow ">
            <thead class="bg-dark bg-gradient text-warning fs-4 ">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">IMAGE</th>
                    <th scope="col">WORD</th>
                    <th scope="col">USER</th>
                    <th scope="col">STATUS</th>
                    <th scope="col">ACTION</th>
                    <th scope="col">DELETE</th>

                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM dictionary_uploadfile";

                $query = mysqli_query($con, $sql);

                while ($run = mysqli_fetch_array($query)) {
                    $id = $run['id'];
                    $img = $run['imagefile'];
                    $text = $run['word'];
                    $name = $run['username'];
                    $syn = $run['synonyms'];
                    $ant = $run['antonyms'];
                    $state = $run['status'];
                ?>

                    <tr class="text-white fs-3">
                        <th><?php echo $id; ?></th>
                        <td><?php echo "<img src='$img' alt='' width=250px height=200px> " ?></td>
                        <td><?php echo $text; ?></td>
                        <td><?php echo $name; ?></td>
                        <td><?php echo $state; ?></td>
                        <td>
                            <form action="" method="post">
                                <?php
                                if ($state == 0) {
                                    echo '<input type="hidden" name="approve" value="' . $id . '">
                                <input type="submit" name="submit" value="Approve" class="btn btn-primary">';
                                } else {
                                    echo '<input type="hidden" name="disapprove" value=" ' . $id . '">
                                <input type="submit" name="submit1" value="Disapprove" class="btn btn-warning">';
                                }
                                ?>
                        </td>
                        <td>
                            <input type="hidden" name="delete" value="<?php echo $id; ?>">
                            <input type="submit" name="submit2" value="Delete" class="btn btn-danger">
                        </td>
                        </form>

                    </tr>
                <?php  } ?>

            </tbody>
        </table>
    </div>




    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>