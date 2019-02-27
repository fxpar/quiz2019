<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>items</title>
		<link rel="stylesheet" href="./res/material.min.css">
			<script src="./res/material.min.js"></script>
			<script type="text/javascript"> 

			</script>
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
  
  $sql="SELECT * FROM chineseskills";

$result=mysqli_query($con,$sql);

  
  while($row = mysqli_fetch_array($result))
{


/*$sql2 = "INSERT INTO questions (question_cat, question_val, reponse_cat, reponse_val)  
          VALUES('simplified','".$row['simplified']."', 'pin1yin1', '".$row['pin1yin1']."'), 
    ('pin1yin1', '".$row['pin1yin1']."', 'simplified', '".$row['simplified']."'), 
    ('simplified', '".$row['simplified']."', 'english', '".$row['english']."'), 
    ('english', '".$row['english']."', 'simplified', '".$row['simplified']."') "; */
	
$sql2 = "INSERT INTO questions (question_cat, question_val, reponse_cat, reponse_val) VALUES
	('simplified','".$row['simplified']."', 'pin1yin1', '".$row['pin1yin1']."'), 
    ('pin1yin1', '".$row['pin1yin1']."', 'english', '".$row['english']."'), 
    ('simplified', '".$row['simplified']."', 'english', '".$row['english']."'), 
    ('english', '".$row['english']."', 'pin1yin1', '".$row['pin1yin1']."') "; 
	
    if (mysqli_query($con, $sql2)) 
{ 
    echo "Records added successfully."; 
} 
else
{ 
    echo "ERROR: Could not able to execute $sql2. "
        .mysqli_error($con); 
} 



}


?>


		<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">question_cat</th>
      <th class="mdl-data-table__cell--non-numeric">question_val</th>
      <th class="mdl-data-table__cell--non-numeric">reponse_cat</th>
	  <th class="mdl-data-table__cell--non-numeric">reponse_val</th>
    </tr>
  </thead>
  <tbody>


<?php

$sql3="SELECT * FROM questions";

$result3=mysqli_query($con,$sql3);

  

  
    while($row3 = mysqli_fetch_array($result3))
{
  //echo $row['nom'];
?>
<tr>
      <td class="mdl-data-table__cell--non-numeric"><?php echo($row3[1]); ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo($row3[2]); ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo($row3[3]); ?></td>
	  <td class="mdl-data-table__cell--non-numeric"><?php echo($row3[4]); ?></td>
    </tr>
<?php
}
 
  
  
  // Free result set
  mysqli_free_result($result);


mysqli_close($con);
  
  
?> 



  </tbody>
</table>

			</div>
			<!-- end layout above -->
		</body>
	</html>