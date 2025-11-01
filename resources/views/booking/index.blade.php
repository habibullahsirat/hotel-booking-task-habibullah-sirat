<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Booking</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex items-center justify-center">
    {{-- Three images side by side --}}
    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-3xl text-center">
        <h2 class="text-3xl font-bold text-gray-800 mb-6">Hotel Booking Form</h2>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
            <img src="/images/sea_view.jpg" alt="Sea View" class="rounded-xl shadow-md object-cover w-full h-48">
            <img src="/images/evening_view.jpg" alt="Evening View" class="rounded-xl shadow-md object-cover w-full h-48">
            <img src="/images/swimming_pool.jpg" alt="Swimming pool" class="rounded-xl shadow-md object-cover w-full h-48">
        </div>

        <!-- 🔹 Show validation errors -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 text-left">
                <ul class="mt-2 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('booking.check') }}" method="POST" class="space-y-4">
            @csrf
            <input type="text" name="name" placeholder="Full Name" value="{{ old('name') }}" required
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">

            <input type="text" name="phone" placeholder="Phone (e.g., 017xxxxxxxx)" value="{{ old('phone') }}" required
                class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">

            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex-1">
                    <label class="block text-gray-700 mb-1">From Date:</label>
                    <input type="date" name="from_date" value="{{ old('from_date') }}" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">
                </div>
                <div class="flex-1">
                    <label class="block text-gray-700 mb-1">To Date:</label>
                    <input type="date" name="to_date" value="{{ old('to_date') }}" required
                        class="w-full border border-gray-300 rounded-lg p-2 focus:ring-2 focus:ring-blue-300">
                </div>
            </div>

            <button type="submit"
                    class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg transition">
                Check Availability
            </button>
        </form>
    </div>

</body>
</html>
