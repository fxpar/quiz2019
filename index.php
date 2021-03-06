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

		  
$uid = 1;		  

$sql="SELECT id,name,scores FROM user where id=$uid";


if ($result=mysqli_query($con,$sql))
  {
  // Fetch one and one row
$user=mysqli_fetch_row($result);
//echo "user:".$user[1];
//echo "scores:".$sql;
//$scores = json_decode($user['scores'], true);
  // Free result set
  mysqli_free_result($result);
}


$qid = 1;



 
  
  /* get questions */
  
  $sql="SELECT * FROM questions";
  
$result=mysqli_query($con,$sql);

$row = mysqli_fetch_all($result,MYSQLI_BOTH);


  // Free result set and connection
mysqli_free_result($result);
mysqli_close($con);



  
?> 


<html>
	<head>
		<meta charset="UTF-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>bonjour</title>
		<link rel="stylesheet" href="./res/material.min.css">
		<style>
@font-face {
	font-family: "Material Icons";
	src: url('./res/MaterialIcons-Regular.ttf');
}
				

</style>
			<script src="./res/material.min.js"></script>
			<script type="text/javascript"> 
			var checked = false;
			var answers;
			var qid;
			var status;
			var scores = new Array();
			function setQuestion(){
				
				document.querySelector('#progressbar1').MaterialProgress.setProgress(70);

		 
				if ( answers !== 'undefined'){
				 answers = <?php echo json_encode($row); ?>;
				 scores = <?php echo json_encode($user[2]); ?>; // change user index to get scores
				}
				var max = answers.length ;
				qid = Math.random() * max ;
				qid = Math.trunc(qid);
				
				document.getElementById("correct").textContent = '';
				document.getElementById("correct").style.display = 'none';
				document.getElementById("uncorrect").textContent = '';
				document.getElementById("uncorrect").style.display = 'none';
				document.getElementById("username").textContent = '<?php echo($user[1]); ?>';
				document.getElementById("question").textContent = answers[qid][2];
				document.getElementById("answerLabel").textContent = answers[qid][3];
				document.getElementById("uanswer").value = "";
				//if (scores[qid]='undefined') {
					scores[qid]=0;
				//	}
				checked = false;
			}
				function checkInput() {
					//alert(checked);
					if (checked == false) {
					var userAnswer = document.getElementById("uanswer").value;
					
					var quizAnswer = answers[qid][4];
						if (userAnswer == quizAnswer) {
							//alert ("perfect!\n" + quizAnswer + " = " + userAnswer);
							document.getElementById("correct").textContent = answers[qid][4];
							document.getElementById("correct").style.display = 'block';
							scores[qid]= scores[qid] +1;
							status="correct";
						}else {
							//alert ("sorry!\n" + quizAnswer + " < > " + userAnswer);
							document.getElementById("uncorrect").textContent = answers[qid][4];
							document.getElementById("uncorrect").style.display = 'block';
							//document.getElementById("success").setAttribute("value", "0");
							scores[qid]= scores[qid] -1;
							status="uncorrect";
						}
					checked = true;
					qid++;
					} 
					if (status == "correct") {
						setTimeout(function(){
							setQuestion();
						}, 2000);
					}else{
						setTimeout(function(){
							setQuestion();
						}, 4000);
					}
					
					return true;
					
				}
				
				function runScript(e) {
    //See notes about 'which' and 'key'
	//catches the "enter" typed on keyboard instead of button type
					if (e.keyCode == 13) {
						checkInput();
						//checked = true;
						return true;
					}
				}
				
				function saveScores(){
					var xhr = new XMLHttpRequest();
						xhr.open('POST', 'scores.php', true);
						xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
						xhr.onload = function () {
							// do something to response
							console.log(this.responseText);
						};
						
						xhr.send('id=1&scores=' + JSON.stringify(scores)); 
					
				}
				
				
			</script>
		</head>
		<body onload="setQuestion();">

			

			<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header ">
<?php require_once('header.html'); ?>

				<div class="mdl-grid" >

					<div class="mdl-cell mdl-cell--4-col">
						<!--centrage-->
<div class="mdl-layout-spacer"></div>
						<!--<h1>Quiz</h1>-->
						<div class="demo-card-square mdl-card mdl-shadow--2dp">

						<div id = "progressbar1" class = "mdl-progress mdl-js-progress"></div>
						
							<div id="username" class="mdl-card__supporting-text" style="text-align:right">
								username
							</div>
							<div class="mdl-card--expand" >
							<h5  id="correct" style="text-align:center; display:none; color:green">correct</h2>
								<h5  id="uncorrect" style="text-align:center; display:none; color:red">uncorrect</h2>
								
								<h2  id="question" style="text-align:center"><?php echo($row[$qid][2]); ?></h2>
							</div>

							<div class="mdl-card__actions mdl-card--border">

								<form method="get" onsubmit="return checkInput();" action="#">
								
									<!-- HIDDEN FIELDS -->
									<input id="userId" name="userId" style="display:none" class="mdl-textfield__input " type="text"  value="1">
									
									<input id="success" name="success" style="display:none" class="mdl-textfield__input " type="text"  value="1">
									
									<div style="word-wrap:normal;display:none" contenteditable="true" class="mdl-textfield__input" type="text" id="qanswer" >
										<?php echo base64_encode($row[$qid][4]); ?></div>
										
									<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
									
									<input name="qId" style="display:none" class="mdl-textfield__input " type="text" id="qId" value="<?php echo ($qid); ?>">
									
										<input id="uanswer" name="uanswer" style="word-wrap:normal" class="mdl-textfield__input " type="text"  autofocus="true" onkeypress="return runScript(event);" >
										<label id="answerLabel" class="mdl-textfield__label" for="sample3">answer</label>
																		
									</div>
									
									
									<button  type="button" onclick="checkInput();" value="Submit" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored"  >
  <i class="material-icons">keyboard_arrow_right</i>
  </button>								


								</form>
								<!--<a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
			  View Updates
			</a>-->
							</div>
						</div><!-- end card -->



					</div>

					<div class="mdl-layout-spacer"></div>
				</div> <!-- end grid -->
				

 <!--</main>
</div>  end page-content -->
			</div> <!-- end layout -->
			
		</body>
	</html>