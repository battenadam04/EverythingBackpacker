<?php

$Term=$_POST["Term"];
$Email=$_POST["Email"];

//required to run stripe 
require_once('../stripe/init.php');

// check what subscription was chosen and then chose relative price in pence
if($Term == "6")
{
$Term = 3000;
}
else
{
$Term=6000;
}


	$errors = array();

	// Need a payment token:
	if (isset($_POST['stripeToken'])) {

		$token = $_POST['stripeToken'];

		// Check for a duplicate submission, just in case:
		// Uses sessions, you could use a cookie instead.
		if (isset($_SESSION['token']) && ($_SESSION['token'] == $token)) {
			$errors['token'] = 'You have apparently resubmitted the form. Please do not do that.';
		} else { // New submission.
			$_SESSION['token'] = $token;
		}

	} else {
		$errors['token'] = 'The order cannot be processed. Please make sure you have JavaScript enabled and try again.';
	}

	// Set the order amount somehow:
	$amount = $Term; // $20, in cents

	// Validate other form data!

	// If no errors, process the order:
	if (empty($errors)) {

		// create the charge on Stripe's servers - this will charge the user's card
		try {

			// set your secret key: remember to change this to your live secret key in production
			// see your keys here https://manage.stripe.com/account
			\Stripe\Stripe::setApiKey("sk_test_ecJSy4wzhpldGt4Xj5AbDeOO");

			// Charge the order:
			$charge = \Stripe\Charge::create(array(
				"amount" => $amount, // amount in cents, again
				"currency" => "aud",
				"source" => $token,
				"description" => $Email
				)
			);

			// Check that it was paid:
			if ($charge->paid == true) {

				// Store the order in the database.
				// Send the email.
				// Celebrate!

			} else { // Charge was not paid!
				echo '<div class="alert alert-error"><h4>Payment System Error!</h4>Your payment could NOT be processed (i.e., you have not been charged) because the payment system rejected the transaction. You can try again or use another card.</div>';
			}

		} catch (\Stripe\Error\Card $e) {
		    // Card was declined.
			$e_json = $e->getJsonBody();
			$err = $e_json['error'];
			$errors['stripe'] = $err['message'];
		} catch (\Stripe\Error\ApiConnection $e) {
		    // Network problem, perhaps try again.
		} catch (\Stripe\Error\InvalidRequest $e) {
		    // You screwed up in your programming. Shouldn't happen!
		} catch (\Stripe\Error\Api $e) {
		    // Stripe's servers are down!
		} catch (\Stripe\Error\Base $e) {
		    // Something else that's not the customer's fault.
		}

	} // A user form submission error occurred, handled below.


echo json_encode($errors);

?>