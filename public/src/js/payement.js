Stripe.setPublishableKey('pk_test_51N3CnDK66FC28y4dyLx0RKAn1xTb5nMQTVcccw9lJHfp4BnLfpFM7tM21TcqLX0FeBAqzpmgloM566zDtvC9fve8003tUatoYj');

var $form = $('#checkout-form');

$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
    Stripe.card.createToken({
        number: $('#card-number').val(),
        cvc: $('#card-cvc').val(),
        exp_month: $('#card-expiry-month').val(),
        exp_year: $('#card-expiry-year').val(),
        name: $('#card-name').val()
    }, stripeResponseHandler);
    return false;   
});

function stripeResponseHandler(status, response){
    if (response.error) {
        $('#charge-error').removeClass('hidden');
        $('#charge-error').text(response.error.message);
        $form.find('button').prop('disabled', false);
    } else {
        var token = response.id;
        $form.append($('<input type="hidden" name="stripeToken"/>').val(token));        
        
        // submit the form:
        $form.get(0).submit();
        
    }
}