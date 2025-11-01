<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Rooms</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-blue-50 to-white flex items-center justify-center">

    <div class="bg-white shadow-lg rounded-2xl p-8 w-full max-w-4xl">
        <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">Available Rooms</h2>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @foreach($availableCategories as $item)
                <div class="bg-blue-50 rounded-xl p-4 text-center shadow-md">
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $item['category']->name }}</h3>

                    <img src="/images/{{ strtolower(str_replace(' ', '-', $item['category']->name)) }}.jpg"
                        alt="{{ $item['category']->name }}"
                        class="rounded-lg object-cover w-full h-40 mb-3">

                    @if($item['available'])
                        <form action="{{ route('booking.confirm') }}" method="POST">
                            @csrf
                            <input type="hidden" name="name" value="{{ $request->name }}">
                            <input type="hidden" name="email" value="{{ $request->email }}">
                            <input type="hidden" name="phone" value="{{ $request->phone }}">
                            <input type="hidden" name="from_date" value="{{ $from }}">
                            <input type="hidden" name="to_date" value="{{ $to }}">
                            <input type="hidden" name="category_id" value="{{ $item['category']->id }}">
                            <button type="submit"
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition">
                                Book {{ $item['category']->name }}
                            </button>
                        </form>
                    @else
                        <p class="text-red-500 font-medium mt-2">No room available</p>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

</body>
</html>
