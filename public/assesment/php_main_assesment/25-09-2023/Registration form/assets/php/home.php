<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page</title>
    <link rel="stylesheet" href="./assets/css/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_css_bootstrap.min.css">

</head>
<body class="container pt-5 ">
 <h3 class="pb-3">welcome <?php session_start() ;
   echo  $_SESSION['name'];
 
   
 ?></h3>   


 <a href="./logout.php" class="btn btn-primary ">Logout</a>
 

 <form action="display.php" method="post" enctype="multipart/form-data"> 
 <div class="mb-3 w-50 mt-3">
  <label class="text-uppercase"> insert your file</lable><br>
  <input class="form-control" type="file" id="formFile" name="file" required>
  <!-- <input type="text" name="username" required >  -->
</div>
<button class="btn btn-dark" type="submit" name="submit">submit</button>

 </form>
 <script src="./assets/js/cdn.jsdelivr.net_npm_bootstrap@5.0.2_dist_js_bootstrap.bundle.min.js"></script>

</body>
</html>