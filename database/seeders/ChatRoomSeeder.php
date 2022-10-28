<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChatRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('chat_rooms')->insert(
            [
                'name' => 'General',
                'created_at' => '2022-10-27 15:24:10',
                'updated_at' => '2022-10-27 15:24:10'
            ]
        );
        
        DB::table('chat_rooms')->insert(
            [
                'name' => 'Tech Talk',
                'created_at' => '2022-10-27 15:25:10',
                'updated_at' => '2022-10-27 15:25:10'
            ]
        );
    }
}
