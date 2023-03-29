<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <script src="https://js.braintreegateway.com/web/dropin/1.24.0/js/dropin.min.js"></script>
</head>

<body>
    <div class="py-12">
        @csrf
        <div id="dropin-container" style="display: flex;justify-content: center;align-items: center;"></div>
        <div style="display: flex;justify-content: center;align-items: center; color: white">
            <a href="{{ route('payment') }}" id="submit-button" class="btn btn-sm btn-success">Submit payment</a>
        </div>
        <script>
            var button = document.querySelector('#submit-button');
            braintree.dropin.create({
                authorization: '18735703173',
                container: '#dropin-container'
            }, function(createErr, instance) {
                button.addEventListener('click', function() {
                    instance.requestPaymentMethod(function(err, payload {
                        // Submit payload.nonce to your server
                    });)
                });
            });
        </script>
    </div>
</body>

</html>
