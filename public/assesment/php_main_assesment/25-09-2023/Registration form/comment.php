<?php
session_start();
include("./include.php");
$name = $_SESSION['name'];

if (isset($_POST['submit'])) {
    $idval = $_POST['approve'];
    $sql = "UPDATE dictionary_commentpanel SET status=1 where id='$idval'";
    $query = mysqli_query($con, $sql);
}

if (isset($_POST['submit1'])) {
    $idval = $_POST['disapprove'];
    $sql = "UPDATE dictionary_commentpanel SET status=0 where id='$idval'";
    $query = mysqli_query($con, $sql);
}



if (isset($_POST['submit2'])) {
    $idval = $_POST['delete'];
    $sql = " DELETE FROM dictionary_commentpanel  where id='$idval'";
    $query = mysqli_query($con, $sql);
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
    <div class="container-fluied comment">
        <div class="d-flex justify-content-around gap-3 bg-dark bg-gradient text-light p-3 anger fixed-top">
            <h4 class="text-info">ADMIN PANEL</h4>
            <h4><a href="./addword.php" class="a1">ADD WORD</a></h4>
            <h4><a href="./addantsyn.php" class="a2">ADD SYNONYMS / ANTONYMS</a></h4>
            <h4><a href="./adminpanel.php" class="a3">WORDS TABLE</a></h4>
            <h4><a href="./comment.php" class="a4">COMMENTS TABLE</a></h4>
            <button class="btn btn-danger"><a href="./logout.php" class="text-decoration-none text-white">logout</a></button>
        </div>
        <div>
            <h2 class="text-center text-uppercase pt-3">words table</h2>
            <hr>
        </div>
        <div class="scrol">
            <table class="container border bg-dark bg-gradient table text-center shadow  ">
                <thead class="bg-dark text-warning bg-gradient fs-4">
                    <tr>
                        <th scope="col">WORD_ID</th>
                        <th scope="col">COMMENT</th>
                        <th scope="col">USER</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">ACTION</th>
                        <th scope="col">DELETE</th>

                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                    $sql = "SELECT * FROM dictionary_commentpanel ";

                    $sql_connect = mysqli_query($con, $sql);

                    while ($result = mysqli_fetch_array($sql_connect)) {
                        $id = $result['id'];
                        $wordid = $result['wordid'];
                        $userid = $result['userid'];
                        $cmd = $result['comments'];
                        $sts = $result['status'];
                    ?>
                        <tr class="text-white fs-5">
                            <th><?php echo $wordid; ?></th>
                            <td><?php echo $cmd; ?></td>
                            <td><?php echo $name; ?></td>
                            <td><?php echo $sts; ?></td>
                            <td class="text-center">
                                <form action="" method="post" class="d-flex gap-4">
                                    <?php
                                    if ($sts == 0) {
                                        echo '<input type="hidden" name="approve" value="' . $id . '">
                                    <input type="submit" name="submit" value="Approve" class="btn btn-primary">';
                                    } else {
                                        echo '<input type="hidden" name="disapprove" value="' . $id . '">
                                    <input type="submit" name="submit1" value="Disapprove" class="btn btn-warning">';
                                    }

                                    ?>
                            </td>
                            <td>
                                <input type="hidden" name="delete" value="<?php echo $id; ?>">
                                <input type="submit" name="submit2" value="Delete" class="btn btn-danger">
                            </td>
                            </form>
                        <?php } ?>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>




    </div>




    <link rel="stylesheet" href="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js">
</body>

</html>