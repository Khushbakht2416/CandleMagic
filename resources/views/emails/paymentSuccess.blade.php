@component('mail::message')
# Payment Successful

Hello {{ $user->name }},

Thank you for your purchase!

This is your confirmation email. We will notify you once your order is shipped. Below is your order info:

### Transaction ID: {{ $transactionId }}
### Order ID: {{ $verification_token }}
### Transaction Email: {{ $user->email }}

### Product Details:
@foreach ($productDetails as $product)
- **{{ $product['name'] }}**{{ '   ' }}-{{ '   ' }}{{ $product['brand'] }}{{ '   ' }}-{{ '   ' }}${{ $product['price'] }}     x     {{ $product['quantity'] }}     =     {{ $product['price'] * $product['quantity'] }}
@endforeach

@component('mail::button', ['url' => url('/order/tracking?' . http_build_query([
    'orderId' => $verification_token,
    'transactionId' => $transactionId,
    'email' => $user->email
]))])
View Order Details
@endcomponent

If you have any questions or issues, please feel free to contact our support team.

Thanks,<br />
{{ config('app.name') }}
@endcomponent
