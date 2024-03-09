<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Show Payment</title>
    </head>
    <body>
        <h1>Payment Details</h1>

        <p><strong>ID:</strong> {{ $payment->id }}</p>
        <p><strong>Amount:</strong> {{ $payment->amount }}</p>
        <p><strong>Paid At:</strong> {{ $payment->paid_at }}</p>

        <!-- Допълнителни детайли за плащането -->
    </body>
</html>
