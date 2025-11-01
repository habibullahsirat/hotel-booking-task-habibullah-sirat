<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomCategory;
use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class BookingController extends Controller
{
    public function index()
    {
        $categories = RoomCategory::all();
        return view('booking.index', compact('categories'));
    }

    public function checkAvailability(Request $request)
    {
        $request->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'phone' => ['required', 'regex:/^(?:\+88|88)?(01[3-9]\d{8})$/'],
            'from_date' => 'required|date|after_or_equal:today',
            'to_date' => 'required|date|after:from_date'
        ]);

        $from = Carbon::parse($request->from_date);
        $to = Carbon::parse($request->to_date);
        $days = CarbonPeriod::create($from, $to);

        $availableCategories = [];

        foreach (RoomCategory::all() as $category) {
            $isAvailable = true;

            foreach ($days as $day) {
                $bookedCount = Booking::where('room_category_id', $category->id)
                    ->whereDate('from_date', '<=', $day)
                    ->whereDate('to_date', '>=', $day)
                    ->count();

                if ($bookedCount >= 3) {
                    $isAvailable = false;
                    break;
                }
            }

            $availableCategories[] = [
                'category' => $category,
                'available' => $isAvailable
            ];
        }

        return view('booking.available', compact('availableCategories', 'from', 'to', 'request'));
    }

    public function confirm(Request $request)
    {
        $category = RoomCategory::findOrFail($request->category_id);
        $from = Carbon::parse($request->from_date);
        $to = Carbon::parse($request->to_date);
        $days = CarbonPeriod::create($from, $to);
        $numNights = $from->diffInDays($to);

        $baseTotal = 0;
        foreach ($days as $day) {
            $isWeekend = in_array($day->format('l'), ['Friday', 'Saturday']);
            $price = $category->base_price;
            if ($isWeekend) {
                $price *= 1.2;
            }
            $baseTotal += $price;
        }

        $finalTotal = $baseTotal;
        if ($numNights >= 3) {
            $finalTotal *= 0.9; // 10% discount
        }

        $booking = Booking::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'room_category_id' => $category->id,
            'from_date' => $from,
            'to_date' => $to,
            'base_price' => $baseTotal,
            'final_price' => $finalTotal,
        ]);

        return view('booking.thankyou', compact('booking', 'category'));
    }
}
