<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Braintree-Demo</title>
    <script src="https://js.braintreegateway.com/web/dropin/1.34.0/js/dropin.min.js"></script>
</head>

<body>
    <form id="payment-form" action="/route/on/your/server" method="post">
        <!-- Putting the empty container you plan to pass to
          `braintree.dropin.create` inside a form will make layout and flow
          easier to manage -->
        <div id="dropin-container"></div>
        <input type="submit" />
        <input type="hidden" id="nonce" name="payment_method_nonce" />
    </form>
    @dump($token)
    <script>
        const form = document.getElementById('payment-form');

        braintree.dropin.create({
            authorization: {!! json_encode($token) !!},
            container: '#dropin-container'
        }, (error, dropinInstance) => {
            if (error) console.error(error);

            form.addEventListener('submit', event => {
                event.preventDefault();

                dropinInstance.requestPaymentMethod((error, payload) => {
                    if (error) console.error(error);

                    document.getElementById('nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });
    </script>
</body>

</html>
