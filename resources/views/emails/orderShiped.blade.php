@component('mail::message')

Hello {{ $userName }},

Your order has been shipped! Below are the shipment details:

Your order with tracking ID <strong>{{ $trackingId }}</strong> has been shipped via **Australia Post**.

You can track your shipment using the tracking number provided.

### Tracking ID: {{ $trackingId }}
### Order Status: {{ ucfirst($orderStatus) }}

Thank you for shopping with us!

Thanks,<br />
{{ config('app.name') }}

@endcomponent
