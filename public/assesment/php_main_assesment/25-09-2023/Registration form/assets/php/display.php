<?php
$upload_image = '';
include('./include.php');
if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $image = $_FILES['file'];

  session_start();

  $id = $_SESSION['getid'];
  $Uname = $_SESSION['name'];




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

  $fileinsert = "UPDATE registration set images='$upload_image' where id = '$id' ";


  // $fileinsert="INSERT INTO fileupload (imagefile)
  // VALUES('$upload_image')";
  $result = mysqli_query($con, $fileinsert);


  if ($result) {
    // echo "data insert successfully"; 
    // header('location:home.php');
  } else {
    die("data not inserted");
  }


  $data = "SELECT * FROM registration";

  $run = mysqli_query($con, $data);

  while ($row = mysqli_fetch_array($run)) {
    $image = $row['images'];
    // echo "<img src='$image' alt='_images' width=200px height=200px> ";
  }
}





?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>display data</title>
  <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">

</head>

<body class="container mt-5">
  
  <table class="table  table-dark table-striped">
    <thead>
      <tr>
        <th>id</th>
        <th>username</th>
        <th>images</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $Uname; ?></td>
        <td><?php echo "<img src='$image' alt='_images' width=200px height=200px> "; ?></td>

      </tr>
    </tbody>
  </table>
  <button class="btn btn-primary"><a href="./home.php" class="text-light">go_back</a></button>
  <script src="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js"></script>

</body>

</html>