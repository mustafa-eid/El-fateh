<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'first_name' => 'Mohamed',
            'last_name' => 'Salah',
            'email' => 'mohamed_sala712@yahoo.com',
            'password' => Hash::make('123456789'),
            'phone' => '01066943748', 
        ]);  
      }
}
