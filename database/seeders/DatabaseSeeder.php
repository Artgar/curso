<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Tema;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Tema::factory(20)->create();
        /*
        User::factory()->create([
            'name' => 'Sergio Garcia',
            'email' => 'sergio@gmail.com',
            'password'=>Hash::make('hola1234'),
            'rol'=>'administrador'
        ]);
        */
    }
}
