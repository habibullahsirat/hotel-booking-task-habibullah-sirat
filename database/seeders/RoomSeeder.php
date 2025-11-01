<?php

namespace Database\Seeders;

use App\Models\RoomCategory;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Premium Deluxe', 'base_price' => 12000],
            ['name' => 'Super Deluxe', 'base_price' => 10000],
            ['name' => 'Standard Deluxe', 'base_price' => 8000],
        ];

        foreach ($categories as $categoryData) {
            $category = RoomCategory::create($categoryData);

            for ($i = 1; $i <= 3; $i++) {
                Room::create([
                    'room_category_id' => $category->id,
                    'room_number' => $category->name . '-' . $i,
                ]);
            }
        }
    }
}
