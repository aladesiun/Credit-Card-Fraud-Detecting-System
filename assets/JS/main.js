$(document).ready(function(){
    // The error part where I would like to hide message after some seconds
    $(".error-message").delay(3200).fadeOut(300);

    // As like as error message
    $(".success-message").delay(3200).fadeOut(300);
});

// set limits of Count Down Timer
var timeLimit = 60; // In seconds

// Count down timer
$(function(){
	$("#s_timer").countdowntimer({
		seconds : timeLimit,
        size : "xl"
	});
});

// Session destroy for transaction
// setTimeout(function() { window.location.href = "helper/clear_transaction.php"; }, timeLimit * 1000);
