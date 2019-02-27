<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>bonjour</title>
		<link rel="stylesheet" href="./res/material.min.css">
			<script src="./res/material.min.js"></script>
			<script type="text/javascript"> 
			var checked = false;
				function checkInput() {
					//alert(checked);
					if (checked == false) {
					var userAnswer = document.getElementById("uanswer").value;
					var quizAnswer = window.atob( document.getElementById("qanswer").textContent);
						if (userAnswer == quizAnswer) {
							alert ("perfect!\n" + quizAnswer + " = " + userAnswer);
							document.getElementById("success").setAttribute("value", "1");
						}else {
							alert ("sorry!\n" + quizAnswer + " < > " + userAnswer);
							document.getElementById("success").setAttribute("value", "0");
						}
					checked = true;
					} 
					return true;
				}
				
				function runScript(e) {
    //See notes about 'which' and 'key'

    if (e.keyCode == 13) {
        checkInput();
		checked = true;
        return true;
    }
}
			</script>
		</head>
		<body >

			<?php

// display errors
error_reporting(E_ALL); 
ini_set('display_errors', 1);


//echo "\$qid=".$qid;

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
		  
		  /* Save answers */
		if(isset($_GET["qId"])) {
			$qid = $_GET["qId"] + 1;
			
			    $sql="INSERT INTO answers (user, question, answer, success) VALUES 
					(".$_GET["userId"].",".$_GET["qId"].",'".htmlspecialchars($_GET["uanswer"])."',".$_GET["success"].")";
				$result=mysqli_query($con,$sql);

				 if ($result) {
				   echo "result inserted";  
				 }
				 else echo "Something went wrong: " . mysqli_error($con);

		}else {
			$qid = 1;
		}




 
  
  /* get questions */
  
  $sql="SELECT * FROM questions where id=$qid";

$result=mysqli_query($con,$sql);

  $row=mysqli_fetch_row($result);

  // Free result set
  mysqli_free_result($result);


mysqli_close($con);
  
  
?> 

			<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
<?php require_once('header.html'); ?>

				<div class="mdl-grid" >

					<div class="mdl-cell mdl-cell--4-col">
						<!--centrage-->

						<!--<h1>Quiz</h1>-->
						<div class="demo-card-square mdl-card mdl-shadow--2dp">
							<div class="mdl-card__supporting-text" style="text-align:right">
								fxp
							</div>
							<div class="mdl-card--expand" >
								<h2  style="text-align:center"><?php echo($row[2]); ?></h2>
							</div>

							<div class="mdl-card__actions mdl-card--border">

								<form method="get" onsubmit="return checkInput();" action="index.php">
									<!-- HIDDEN FIELDS -->
									<input id="userId" name="userId" style="display:none" class="mdl-textfield__input " type="text"  value="1">
									
									<input id="success" name="success" style="display:none" class="mdl-textfield__input " type="text"  value="1">
									
									<div style="word-wrap:normal;display:none" contenteditable="true" class="mdl-textfield__input" type="text" id="qanswer" >
										<?php echo base64_encode($row[4]); ?></div>
										
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
									
									<input name="qId" style="display:none" class="mdl-textfield__input " type="text" id="qId" value="<?php echo ($qid); ?>">
									
										<input style="word-wrap:normal" class="mdl-textfield__input " type="text" id="uanswer" name="uanswer" autofocus="true" onkeypress="return runScript(event);" >
										<label class="mdl-textfield__label" for="sample3"><?php echo($row[3]); ?></label>
																		
									</div>
									
									
									<button  type="submit" value="Submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored"  >
  <i class="material-icons">→</i>
  </button>								


								</form>
								<!--<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			  View Updates
			</a>-->
							</div>
						</div>



					</div>

					<div class="mdl-layout-spacer"></div>
				</div>
				<!-- end grid above -->


			</div>
			<!-- end layout above -->
		</body>
	</html>