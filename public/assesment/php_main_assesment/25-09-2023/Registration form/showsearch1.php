<?php

//  page one view

session_start();

$getdata = '';
include("./include.php");
ob_start();

//Routing
$word = explode(".", basename($_SERVER['REQUEST_URI']))[0];

if (isset($_SESSION['name'])) {
    //session variables
    $username = $_SESSION['name'];
    $image = $_SESSION['img'];
    $id = $_SESSION['getid'];
    $idval = $_SESSION['idget'];


    $sql = "SELECT * FROM dictionary_uploadfile where word='$word' ";
    $query = mysqli_query($con, $sql);

    $result = mysqli_fetch_array($query);
    if ($result) {
        $run = $result['synonyms'];
        $row = $result['antonyms'];
        $images = $result['imagefile'];
    } else {
        header("location:./errorpage.php");
        ob_end_flush();
    }





    if (isset($run) || isset($row)) {

        $decodedata = json_decode($run);
        $decodeant = json_decode($row);
    } else {
        $decodedata = [];
        $decodeant = [];
    }


    if (isset($_POST['submit'])) {
        $getdata1 = $_POST['text'];
        $sqls = "SELECT * FROM dictionary_uploadfile where word='$getdata1' and status=1";

        $que = mysqli_query($con, $sqls);

        while ($result = mysqli_fetch_array($que)) {

            $word = $result['word'];
            $images = $result['imagefile'];
            $run = $result['synonyms'];
            $row = $result['antonyms'];
            $decodedata = json_decode($run);
            $decodeant = json_decode($row);
        }
    }





    if (isset($_POST['submit1'])) {
        $txtval = $_POST['txtarea'];
        echo $txtval;






        $echo($txtval);
        $sql = "INSERT INTO dictionary_commentpanel(wordid,word,userid,username,comments)
        values('$id','$word','$idval','$username','$txtval')";
        $query = mysqli_query($con, $sql);
    }

?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>content_view_page</title>
        <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">

    </head>

    <body>
        <div class="container-fluied signup pt-5">
            <div class="container  rounded ps-5 pe-5 contain_search2">
                <div class="d-flex justify-content-between pt-3 pb-2 ">
                    <div>
                        <form action="" method="post">
                            <input type="text" class="rounded" name="text">
                            <input type="submit" value="search" name=submit>
                        </form>
                    </div>
                    <div>
                        <button class="btn btn-danger"><a href="./addword.php" class="text-white text-decoration-none">+</a></button>
                        <button class="btn btn-primary"><a href="./logout.php" class="text-white text-decoration-none">logout</a></button>
                        <button class="btn btn-danger"><a href="./page_one.php" class="text-white text-decoration-none">Back</a></button>
                    </div>
                </div>
                <div class="d-flex flex-column gap-2 flex-wrap">
                    <h3>word:<?php echo $word; ?></h3>
                    <?php echo "<img src='$images' alt='' width='150px' height='150px'>"; ?>
                    <h5 class="fs-2">synonyms:</h5>
                    <p class="fs-4">
                        <?php
                        if ($decodedata == 0) {
                            echo "Add a synonyms";
                        } else {

                            foreach ($decodedata as $val) {
                                echo "$val" . ",";
                            }
                        }
                        ?>
                        <button class="btn btn-danger"><a href="./addsynonyms.php?getid=<?php echo $id; ?>" class="text-white text-decoration-none">+</a></button>
                    </p>
                    <h5 class="fs-2">Antonymns: </h5>
                    <p class="fs-4">
                        <?php

                        if ($decodeant == 0) {
                            echo "Add a antonyms";
                        } else {

                            foreach ($decodeant as $val) {
                                echo "$val" . ",";
                            }
                        }
                        ?>
                        <button class="btn btn-danger"><a href="./addAntonyms.php?getid=<?php echo $id; ?>" class="text-white text-decoration-none">+</a></button>
                    </p>
                    <h4 class="fs-2">Add comments here</h4>
                    <form action="" method="post">
                        <textarea class="w-25 mb-2" id="exampleFormControlTextarea1" rows="3" name="txtarea"></textarea><br>
                        <input type="submit" name="submit1" value="post" class="btn btn-success">
                    </form>
                    <h5 class="fs-2">comments</h5>
                    <?php

                    $sql1 = "SELECT * FROM dictionary_commentpanel where word='$word' and status=1";

                    $query = mysqli_query($con, $sql1);

                    while ($result = mysqli_fetch_array($query)) {
                        $data = $result['comments'];
                        $name = $result['username'];

                    ?>
                        <p class="fs-5">
                            <?php echo '[' . $name . ']'; ?>
                            <?php echo '--' . $data; ?>
                        </p>
                    <?php }; ?>
                </div>
            </div>
        </div>

        <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
    </body>

    </html>

    <!-- page two view -->

<?php
} else {

    //routing
    $word = explode(".", basename($_SERVER['REQUEST_URI']))[0];
    //get url
    $url = '';
    $error = '';
    $url = $_SERVER['REQUEST_URI'];
    include("./include.php");
    $_SESSION['url1'] = $url;



    $sql = "SELECT * FROM dictionary_uploadfile where word='$word'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_fetch_array($query);
    if ($result) {
        $run = $result['synonyms'];
        $row = $result['antonyms'];
        $image = $result['imagefile'];
        $decodedata = json_decode($run);
        $decodeant = json_decode($row);
    } else {
        header("location:./errorpage.php");
        ob_end_flush();
    }



    if (isset($_POST['submit'])) {
        $getdata = $_POST['text'];
        $sqls = "SELECT * FROM dictionary_uploadfile where word='$getdata' and status=1";
        $que = mysqli_query($con, $sqls);
        while ($result = mysqli_fetch_array($que)) {

            $word = $result['word'];
            $image = $result['imagefile'];

            $run = $result['synonyms'];
            $row = $result['antonyms'];

            $decodedata = json_decode($run);
            $decodeant = json_decode($row);
        }
    }
    if (isset($_POST['post'])) {
        $error =
            '<h4 class="alert alert-danger w-25" role="alert">
    First login or Register this page.
</h4>';
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
        <div class="pt-5 container-fluied signup">
            <div class="pt-5 container  ps-5 pe-5 rounded shadow contain_search2">
                <div class="d-flex justify-content-between pt-3 pb-2">
                    <div>
                        <form action="" method="post">
                            <input type="text" class="rounded" name="text">
                            <input type="submit" value="search" name="submit" class="btn btn-dark">
                        </form>
                    </div>
                    <div>
                        <button class="btn btn-primary"><a href="./login.php " class="text-white text-decoration-none">login</a></button>
                        <button class="btn btn-success"><a href="./signup.php?" class="text-white text-decoration-none">register</a></button>
                        <button class="btn btn-danger"><a href="./index.php" class="text-white text-decoration-none">Back</a></button>
                    </div>
                </div>
                <div>
                    <h3>word:<?php echo $word; ?></h3>
                    <?php echo " <img src='$image' alt=''  width='150px' height='150px' >" ?>
                    <h5 class="fs-2">synonyms:</h5>
                    <p class="fs-4">
                        <?php

                        if ($decodedata == 0) {
                            echo "Add a synonyms";
                        } else {

                            foreach ($decodedata as $val) {
                                echo "$val" . ",";
                            }
                        }
                        ?>
                    </p>
                    <h5 class="fs-2">Antonymns:</h5>
                    <p class="fs-4">
                        <?php

                        if ($decodeant == 0) {
                            echo "Add a synonyms";
                        } else {

                            foreach ($decodeant as $val) {
                                echo "$val" . ",";
                            }
                        }
                        ?>
                    </p>
                    <h4 class="fs-2">Add comments here</h4>
                    <form action="" method="post">
                        <textarea class="w-25 mb-2" id="exampleFormControlTextarea1" rows="3"></textarea><br>
                        <input type="submit" value="post" name="post" class="btn btn-info mb-2">
                        <?php echo $error; ?>
                    </form>
                    <h5 class="fs-2">comments </h5>
                    <?php

                    $sql1 = "SELECT * FROM dictionary_commentpanel where word ='$word' and status=1 ";

                    $query = mysqli_query($con, $sql1);

                    while ($result = mysqli_fetch_array($query)) {

                        $res = $result['comments'];
                        $name = $result['username'];

                    ?>
                        <table>
                            <tr class="fs-5">
                                <td><?php echo '[' . $name . ']'; ?></td>
                                <td><?php echo '--' . $res; ?></td>
                            </tr>
                        </table>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
        <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
    </body>

    </html>

<?php
} ?>
