<?php
    include 'helper/config.php';

    session_start();

    if (isset($_SESSION['username'])) {
        // logged in
        // Something will happen here....
    } else {
        // not logged in
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Settings | Credit Card</title>

	<!-- Load all static files -->
	<link rel="stylesheet" type="text/css" href="assets/BS/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/styles.css">
</head>
<body class="container">
    <!-- Config included -->
	<?php 
        include 'helper/navbar.html';
    ?>

    <div class="row">
        <h1 class="text-center">Settings</h1>
        <br/>
        <div class="col-sm-12 col-md-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="text-22px text-center">Allowed Branched</p>
                </div>
                <div class="panel-body">
                    <p class="text-center">All the settings will be here :)</p>
                </div>
            </div>
        </div>
    </div>

     
</body>
<footer>
	<!-- All the Javascript will be load here... -->
	<script type="text/javascript" src="assets/JS/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="assets/JS/main.js"></script>
	<script type="text/javascript" src="assets/BS/js/bootstrap.min.js"></script>
</footer>
</html>