<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>bonjour</title>
		<link rel="stylesheet" href="./res/material.min.css">
			<script src="./res/material.min.js"></script>

		</head>
		<body >
					<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<?php require_once('header.html'); ?>

<?php

// display errors
error_reporting(E_ALL); 
ini_set('display_errors', 1);

// include config file with passwords
define('__ROOT__', dirname(dirname(__FILE__)));
require_once('config.php');


$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
mysqli_set_charset( $con, 'utf8');
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  
  $sql="TRUNCATE TABLE questions";

$result=mysqli_query($con,$sql);


 if ($result) {
   echo "Request questions table has been truncated";  
 }
 else echo "Something went wrong: " . mysql_error();

  // Free result set
  //mysqli_free_result($result);


mysqli_close($con);
  
  
?> 

			</div>
			<!-- end layout above -->
		</body>
	</html>