<!-- Check for a valid transaction -->
<?php
	session_start();

	if(isset($_SESSION['account'])) {
		// Do something if anything special you need.
	}else{
		header("Location: index.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Credit Card Faurd Detecting System</title>

	<!-- Load all static files -->
	<link rel="stylesheet" type="text/css" href="assets/BS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">

</head>
<body class="container">
	<!-- Navbar included -->
	<?php include 'helper/navbar.html' ?>
	<!-- Config included -->
	<?php include 'helper/config.php' ?>

	<div class="row">
		<div class="col-sm-12 col-md-8">
			<h1>Trasactions ... ...</h1>
		</div>
		<!-- The clock / time limit will be here -->
		<div class="col-sm-12 col-md-4">
			<h2>You are running out of time</h2>
			<div id="s_timer"></div>
		</div>
	</div>
	
</body>
<footer>
	<!-- All the Javascript will be load here... -->
	<script type="text/javascript" src="assets/JS/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="assets/JS/jquery.countdownTimer.min.js"></script>
	<script type="text/javascript" src="assets/JS/main.js"></script>
	<script type="text/javascript" src="assets/BS/js/bootstrap.min.js"></script>
</footer>
</html>