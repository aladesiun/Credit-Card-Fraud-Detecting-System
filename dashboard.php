<!-- After submiting the form -->
<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$card_number = $_POST['card_number'];
		$pin = $_POST['pin'];
		$branch_id = $_POST['branch_id'];

		// Get all the the pins with card number then I'll match with inputed data
		$query = "SELECT * FROM credit_card";
		$credit_cards = $conn->query($query);

		if ($credit_cards->num_rows > 0) {
			// Declare some helper arrays
			$card_number_array = array();
			while($row = $credit_cards->fetch_assoc()) {
				array_push($card_number_array, $row["ac_number"]);
			}
		}

		$matched = False;
		// Match with the inputed data
		for($i=0; $i<count($card_number_array); $i++){
			if($card_number == $card_number_array[$i]){
				$matched = True;
				break;
			}
		}
		// After matching 
		if($matched) {
			// Again call db for specific response
			$card_data_sql = "SELECT * FROM credit_card WHERE ac_number=".$card_number." AND pin=".$pin;
			$card_data = $conn->query($card_data_sql);

			if($card_data->num_rows == 0){
				echo '<p class="error-message">You are not authorised!!</p>';
			}

			if($card_data->num_rows == 1){
				$row = $card_data->fetch_row();
				$allowed_branches = $row[1];

				if(strpos($allowed_branches, $branch_id)) {
					echo '<p class="success-message">Successfully withdrawn :)</p>';
				}else {
					echo '<p class="error-message">SORRY! This Branch is not Allowed!!</p>';
				}
			}
			
		}else {
			echo '<p class="error-message">You are not authorised!!</p>';
		}
	}
	
?>

<div class="row">
	<h2 class="text-center">Dashboard</h2>
<?php 
	// Get branches data from database
	$sql = "SELECT * FROM branch";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$name = $row["name"];
	        
			echo '
				<div class="col-xs-6 col-md-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h3>'.$name.' Branch</h3>
						</div>
						<div class="panel-body">
							<form method="POST" action="" class="form-group">
								<label>Your A/C Number</label>
								<input type="text" name="card_number" class="form-control" required/>
								<br/>
								<label>Your PIN</label>
								<input type="password" name="pin" class="form-control" required/>
								<input type="hidden" name="branch_id" value="'.$row["id"].'"/>
								<br/>
								<input class="btn btn-success" type="submit" name="submit" value="Withdraw"/>
							</form>
						</div>
					</div>
				</div>
			';
	    }
	} else {
	    echo "0 results";
	}
	// $conn->close();
?>

</div>
