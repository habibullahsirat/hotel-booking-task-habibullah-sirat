<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex items-center justify-center">

    <div class="bg-white p-10 rounded-2xl shadow-xl text-center max-w-md">
        <h2 class="text-3xl font-bold text-gray-800 mb-3">Booking Confirmed!</h2>
        <p class="text-gray-600 mb-6">Thank you, {{ $booking->name }}!
        Your booking details are below.</p>

        <div class="text-left text-gray-700 space-y-1 mb-6">
            <p><strong>Room Category:</strong> {{ $category->name }}</p>
            <p><strong>From:</strong> {{ \Carbon\Carbon::parse($booking->from_date)->format('F j, Y') }}</p>
            <p><strong>To:</strong> {{ \Carbon\Carbon::parse($booking->to_date)->format('F j, Y') }}</p>
            <p><strong>Base Price:</strong> {{ $booking->base_price }} BDT</p>
            <p><strong>Final Price (After Discount/Weekend):</strong> {{ $booking->final_price }} BDT</p>
        </div>

        <a href="{{ url('/') }}"
            class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg transition">
            Back to Home
        </a>
    </div>

</body>
</html>
