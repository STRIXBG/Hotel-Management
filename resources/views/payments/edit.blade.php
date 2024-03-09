<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Edit Payment</title>
    </head>
    <body>
        <h1>Edit Payment</h1>

        <form action="{{ route('payments.update', $payment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label for="hotel_id">Hotel ID:</label><br>
            <input type="text" id="hotel_id" name="hotel_id" required><br>

            <label for="room_id">Reservation ID:</label><br>
            <input type="text" id="reservation_id" name="reservation_id" required><br>

            <label for="amount">Amount:</label><br>
            <input type="number" id="amount" name="amount" required><br>

            <label for="paid_at">Date:</label><br>
            <input type="date" id="paid_at" name="paid_at" required><br>

            <button type="submit">Update Payment</button>
        </form>
    </body>
</html>
