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
        <div class="col-sm-12 col-md-12">
            <!-- After submitting the form -->
            <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $trans_limit = $_POST['trans_limit'];
                    if($trans_limit > 0){
                        $user_pk = $_POST['user_id'];
                        $update_sql = "UPDATE account SET trans_limit=".$trans_limit." WHERE user_id=".$user_pk;
                        
                        $updated = $conn->query($update_sql);
                        if($updated) {
                            echo '<p class="success-message">Successfully set!!</p>';
                        }else{
                            echo '<p class="error-message">May be you are doing wrong<br>Contact with the Service Provider</p>';
                        }
                    }else {
                        echo '<p class="error-message">SORRY!! You can\'t set 0(Zero) here</p>';
                    }
                }
            ?>

            <div class="panel panel-info">
                <div class="panel-heading">
                    <p class="text-22px text-center">Settings</p>
                </div>
                <div class="panel-body">
                    <div class="col-sm-6 col-md-6">
                        <?php
                        // get user data (id only)
                        $email = $_SESSION['username'];
                        $user_data_sql = "SELECT id FROM users WHERE email='".$email."'";
                        $user_data = $conn->query($user_data_sql);
                        if($user_data->num_rows == 1){
                            $user_pk = $user_data->fetch_row()[0];
                            // Now I got login user ID
                            $ac_info_sql = "SELECT id, trans_limit FROM account WHERE user_id=".$user_pk;
                            $account_data = $conn->query($ac_info_sql);
                            
                            // Work with account data
                            if($account_data->num_rows == 1) {
                                $transaction_limit = $account_data->fetch_row()[1];
                                // echo $transaction_limit;
                            }
                        }
                        echo '
                            <p class="list-head">(*_*) Per Transaction Limit</p>
                            <div class="mini-container">
                                <div class="nice-border">
                                    <form method="POST" action="" class="form-group p-a-sm">
                                        <label>Transaction Limit</label>
                                        <input type="hidden" name="user_id" value="'.$user_pk.'">
                                        <input type="number" name="trans_limit" class="form-control" value="'.$transaction_limit.'" required/>
                                        <br/>
                                        <input class="btn btn-info btn-block" type="submit" name="submit" value="Update"/>
                                    </form>
                                </div>
                            </div>
                        ';
                        ?>
                    </div>

                    <div class="col-sm-6 col-md-6">
                        <p class="list-head">(*_*) Allowed Branches</p>
                        <div class="mini-container">
                            <div class="nice-border">
                                <form method="POST" action="" class="form-group p-a-sm">
                                    <label>Your Allowed Branches</label>
                                    <div class="bg-list-item">
                                        <span class="list-item">Dhaka</span>
                                        <span class="list-item">Sylhet</span>
                                        <span class="list-item">Tangail</span>
                                        <span class="list-item">Uttara 2</span>
                                    </div>
                                    <br/>
                                    <label>Set Allowed Branches</label>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">Option 1</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">Option 2</label>
                                    </div>
                                    <div class="radio">
                                        <label><input type="radio" name="optradio">Option 3</label>
                                    </div>
                                    <br/>
                                    <input class="btn btn-info btn-block" type="submit" name="submit" value="Update"/>
                                </form>
                            </div>
                        </div>
                    </div>
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