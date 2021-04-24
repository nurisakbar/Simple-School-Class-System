<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $rooms = [
            ['name'=>'Room A'],
            ['name'=>'Room B'],
            ['name'=>'Room C'],
            ['name'=>'Room D'],
            ['name'=>'Room E'],
            ['name'=>'Room F'],
            ['name'=>'Room G'],
        ];

        Room::insert($rooms);
    }
}
