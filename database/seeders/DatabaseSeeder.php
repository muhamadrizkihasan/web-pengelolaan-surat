<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::create([
            'name' => 'Rizki',
            'email' => 'rizki@gmail.com',
            // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi / dibaca orang lain
            // Selain hash ada juga (bcrypt)
            'password' => Hash::make('staff'),
            'role' => 'staff',
        ]);

        User::create([
            'name' => 'Hasan',
            'email' => 'hasan@gmail.com',
            // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi / dibaca orang lain
            // Selain hash ada juga (bcrypt)
            'password' => Hash::make('guru'),
            'role' => 'guru',
        ]);
    }
}
