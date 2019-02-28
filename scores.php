<?php

// display errors
error_reporting(E_ALL); 
ini_set('display_errors', 1);


if ($_POST['id']!=''){

				// include config file with passwords
				define('__ROOT__', dirname(dirname(__FILE__)));
				require_once('config.php');

	echo "id=". $_POST['id']."</br>";
	echo "scores:".$_POST['scores']."</br>";
	
				
				
		
				$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
				mysqli_set_charset( $con, 'utf8');
				// Check connection
						if (mysqli_connect_errno())
						  {
						  echo "Failed to connect to MySQL: " . mysqli_connect_error();
						  }
						  
						  //json_encode
					
								//Example PHP array
								$example = array(1, 2, 3);
								 
								//Encode $example array into a JSON string.
								$exampleEncoded = json_encode($_POST['scores']);
								 
								//Insert the string into a column
								$sql = "UPDATE user SET scores='".$exampleEncoded."'   WHERE id =".$_POST['id'];
								 
								$result=mysqli_query($con,$sql);




				// Free result set
				//mysqli_free_result($result);


				mysqli_close($con);
		
}		  
  
?> 