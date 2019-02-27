<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>items</title>
		<link rel="stylesheet" href="./res/material.min.css">
			<script src="./res/material.min.js"></script>
			<script type="text/javascript"> 
				function checkInput() {
					var userAnswer = document.getElementById("uanswer").value
					var quizAnswer = window.atob( document.getElementById("qanswer").textContent);
					if (userAnswer == quizAnswer) {
						alert ("perfect!\n" + quizAnswer + " = " + userAnswer);
					}else {
						alert ("sorry!\n" + quizAnswer + " < > " + userAnswer);
					}
				}
				
				function runScript(e) {
    //See notes about 'which' and 'key'

    if (e.keyCode == 13) {
        checkInput();
        return false;
    }
}
			</script>
		</head>
		<body >
					<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
					
<?php require_once('header.html'); ?>
		
		<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp">
  <thead>
    <tr>
      <th class="mdl-data-table__cell--non-numeric">simplified</th>
      <th class="mdl-data-table__cell--non-numeric">pin1yin1</th>
      <th class="mdl-data-table__cell--non-numeric">pinyin</th>
	  <th class="mdl-data-table__cell--non-numeric">english</th>
    </tr>
  </thead>
  <tbody>
		
		
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
  //echo $row['nom'];
?>
<tr>
      <td class="mdl-data-table__cell--non-numeric"><?php echo($row[1]); ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo($row[2]); ?></td>
      <td class="mdl-data-table__cell--non-numeric"><?php echo($row[3]); ?></td>
	  <td class="mdl-data-table__cell--non-numeric"><?php echo($row['english']); ?></td>
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