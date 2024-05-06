<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Mail</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap');

    * {
        font-family: "Ubuntu", sans-serif;
        font-weight: 400;
        font-style: normal;
    }

    th {
        font-weight: bold;
    }
</style>

<body>

    @if ($mailData['userType'] == 'customer')
        <h1>Thanks For Your Order !!</h1>
        <h2>Your Order Id is #{{ $mailData['order']->id }}</h2>
    @else
        <h1>You Recieved An Order! Placed By {{ $mailData['order']->first_name }}&nbsp;{{ $mailData['order']->last_name }}</h1>
        <h2>Order Id is #{{ $mailData['order']->id }}</h2>
    @endif



    <h2>Shipping Address</h2>
    <address>
        <strong> <span style="font-weight: bold">Full Name:</span> {{ $mailData['order']->first_name }}
            {{ $mailData['order']->last_name }}</strong><br>
        {{ $mailData['order']->address }} <br>
        {{ $mailData['order']->city }}, {{ $mailData['order']->post_code }} <br>
        @if ($mailData['order']->apartment)
            <span style="font-weight: bold">Apartment: </span> {{ $mailData['order']->apartment }} <br>
        @endif
        @if ($mailData['order']->notes)
            <span style="font-weight: bold">Note To Rider:</span> {{ $mailData['order']->notes }} <br><br>
        @endif
        <span style="font-weight: bold">Phone:</span> {{ $mailData['order']->phone }} <br>
        <span style="font-weight: bold">Email:</span> {{ $mailData['order']->email }} <br>

    </address>
    <br>
    <table cellpadding = "5" cellspacing = "5" border="0" width="100%">
        <thead>
            <tr style="background: #CCC;">
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mailData['order']->items as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price) }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ number_format($product->total, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3" align="right">Subtotal:</th>
                <td>{{ number_format($mailData['order']->subtotal, 2) }}</td>
            </tr>

            <tr>
                <th colspan="3" align="right">Shipping:</th>
                <td>{{ number_format($mailData['order']->shipping, 2) }}</td>
            </tr>
            <tr>
                <th colspan="3" align="right">Grand Total:</th>
                <td>{{ number_format($mailData['order']->grand_total, 2) }} PKR</td>
            </tr>
        </tbody>
    </table>
</body>

</html>
