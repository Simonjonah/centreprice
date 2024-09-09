<!DOCTYPE html>
<html>
<head>
    <title>Paystack Payment</title>
</head>
<body>
    <h1>Proceed to Payment</h1>

    @if(isset($authorizationUrl))
        <p>Your payment reference: <strong>{{ $reference }}</strong></p>
        <p>
            <a href="{{ $authorizationUrl }}" target="_blank">Click here to pay</a>
        </p>
        <p>The payment page will open automatically in a few seconds.</p>

        <!-- Automatically load the URL after a short delay -->
        <script type="text/javascript">
            setTimeout(function(){
                window.location.href = "{{ $authorizationUrl }}";
            }, 3000); // 3-second delay before redirect
        </script>
    @else
        <p>Error: {{ $error }}</p>
    @endif
</body>
</html>
