Stripe.setPublishableKey('pk_test_9gKaZKNXcTc3uh1S9D8QSPwS');

var $form = $('#checkoutForm');

$form.submit(function(event) {
	$('#chargeError').addClass('hidden');
	$form.find('button').prop('disabled', true); //disable the button
	Stripe.card.createToken({
		number: $('#cardNumber').val(),
		cvc: $('#cardCVC').val(),
		exp_month: $('#cardExpiryMonth').val,
		exp_year: $('#cardExpiryYear').val(),
		name: $('#cardName').val()
	}, stripeResponseHandler);
	return false;  // wait a while
	// We are done. Don't continue with the form submission
	// we don't want to continue with the charge because I haven't validate the credit card information yet
});


function stripeResponseHandler(status, response) {
	if (response.error) {
		$('#chargeError').removeClass('hidden');
		$('#chargeError').text(response.error.message);
		// response.error.message - is the response by the Stripe
		$form.find('button').prop('disabled', false);
	} else { // if we don't have the error
		// I know that the validation was successful 
		// and the Stripe will have been send a token
		var token = response.id;
		// append this token the my form
		$form.append($('<input type="hidden" name="stripeToken" />').val(token));

		// Submit the form:
		$form.get(0).submit(); // get(0) - get the form and than submit
	}
}
