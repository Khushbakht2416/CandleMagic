<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Order Receipt #{{ $order->id }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      font-size: 12px;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .receipt-container {
      width: 100%;
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #ddd;
    }
    .header, .footer {
      text-align: center;
      margin-bottom: 20px;
    }
    .header img {
      max-width: 150px;
      margin-bottom: 10px;
    }
    .header h1 {
      font-size: 24px;
      margin: 0;
    }
    .info-section {
      margin-bottom: 20px;
    }
    .info-section h2 {
      font-size: 18px;
      border-bottom: 1px solid #ccc;
      padding-bottom: 5px;
      margin-bottom: 10px;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 10px;
    }
    table thead {
      background: #f4f4f4;
    }
    table th, table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .total {
      text-align: right;
      font-size: 16px;
      font-weight: bold;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="receipt-container">
    <!-- Header Section -->
    <div class="header">
      <img src="backend/img/logo.png" alt="Company Logo">
      <h1>Candle Magic</h1>
      <p>123 Main Street, City, Country</p>
      <p>Phone: (123) 456-7890 | Email: info@candlemagic.com</p>
    </div>

    <!-- Order Summary -->
    <div class="info-section">
      <h2>Order Receipt</h2>
      <p><strong>Order Number:</strong> #{{ $order->id }}</p>
      <p><strong>Order Date:</strong> {{ $order->created_at->format('d M Y, h:i A') }}</p>
      <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
    </div>

    <!-- Billing Details -->
    <div class="info-section">
      <h2>Billing Details</h2>
      @php
        $billing = json_decode($order->billing_details);
      @endphp
      <p><strong>Name:</strong> {{ $billing->first_name ?? '' }} {{ $billing->last_name ?? '' }}</p>
      <p><strong>Email:</strong> {{ $billing->email ?? 'N/A' }}</p>
      <p><strong>Phone:</strong> {{ $billing->phone ?? 'N/A' }}</p>
      <p><strong>Address:</strong> {{ $billing->address_line1 ?? '' }}, {{ $billing->state ?? '' }}, {{ $billing->country ?? '' }}</p>
      <p><strong>Postal Code:</strong> {{ $billing->postcode ?? '' }}</p>
    </div>

    <!-- Payment Details -->
    <div class="info-section">
      <h2>Payment Details</h2>
      <p><strong>Payment Method:</strong> {{ ucfirst($order->payment->payment_method) }}</p>
      <p><strong>Transaction ID:</strong> {{ $order->payment->transaction_id }}</p>
      <p><strong>Amount Paid:</strong> ${{ number_format($order->payment->amount, 2) }}</p>
      <p><strong>Currency:</strong> {{ strtoupper($order->payment->currency) }}</p>
      <p><strong>Payment Status:</strong> {{ ucfirst($order->payment->status) }}</p>
    </div>

    <!-- Ordered Items -->
    <div class="info-section">
      <h2>Ordered Items</h2>
      @php
        $orderDetails = json_decode($order->order_details, true);
      @endphp
      <table>
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Brand</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orderDetails as $item)
          <tr>
            <td>{{ $item['name'] ?? 'N/A' }}</td>
            <td>{{ $item['options']['brand'] ?? 'N/A' }}</td>
            <td>{{ $item['qty'] ?? 0 }}</td>
            <td>${{ number_format($item['price'], 2) }}</td>
            <td>${{ number_format($item['qty'] * $item['price'], 2) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <p class="total">Total: ${{ number_format($order->total_price, 2) }}</p>
    </div>

    <!-- Footer Section -->
    <div class="footer">
      <p>Thank you for your purchase!</p>
      <p>&copy; {{ date('Y') }} Candle Magic. All Rights Reserved.</p>
    </div>
  </div>
</body>
</html>
