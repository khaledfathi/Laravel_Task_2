<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Database\Seeder;
use App\Models\User; 

class MySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "name"=> 'khaled',
            "password"=>Hash::make('command') 
        ]); 
    }
}
