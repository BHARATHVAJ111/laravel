<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>nothing to say</h1>
	<?php 
	   $searchedWord = explode(".", basename($_SERVER['REQUEST_URI']))[0];
	   echo $searchedWord;
	?>
</body>
</html>