@component('mail::message')
# Order Status Updated

Hello {{ $userName }},

Your order status has been updated. Below are the details:

### Transaction ID: {{ $transactionId }}
### Order ID: {{ $verificationToken }}
### Order Status: {{ ucfirst($orderStatus) }}
### Transaction Email: {{ $userEmail }}


If you have any questions or issues, please feel free to contact our support team.

Thanks,<br />
{{ config('app.name') }}
@endcomponent
