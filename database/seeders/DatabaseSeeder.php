<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Letter;
use App\Models\LetterType;
use App\Models\Result;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // User::create([
        //     'name' => 'Staff-Tu',
        //     'email' => 'staff@gmail.com',
        //     // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi / dibaca orang lain
        //     // Selain hash ada juga (bcrypt)
        //     'password' => Hash::make('staff'),
        //     'role' => 'staff',
        // ]);

        User::create([
            'name' => 'Misbah',
            'email' => 'misbah@gmail.com',
            // hash : enkripsi agar password tersimpan berisi teks acak agar tidak bisa diprediksi / dibaca orang lain
            // Selain hash ada juga (bcrypt)
            'password' => Hash::make('misbah'),
            'role' => 'guru',
        ]);

        // Result::create([
        //     'letter_id' => 1,
        //     'notes' => 'manajajakckajcajbcjabjcabj',
        //     'presence_recepients' => 'jbadhabdhbabjcabjajcnan',
        // ]);
        // Result::create([
        //     'letter_id' => 2,
        //     'notes' => 'manajajakckajcajbcjabjcabj',
        //     'presence_recepients' => 'jbadhabdhbabjcabjajcnan',
        // ]);
        
        // LetterType::create([
        //     'letter_code' => 765567,
        //     'name_type' => 'Rapat Guru',
        // ]);
        // LetterType::create([
        //     'letter_code' => 234432,
        //     'name_type' => 'Rapat Pembimbing Siswa',
        // ]);
        
        // Mendapatkan ID dari tipe surat tertentu, atau Anda bisa langsung menggunakan ID yang sesuai
        // $letterTypeId = LetterType::where('name_type', 'Surat Pemberitahuan')->first()->id;

        // // Mendapatkan ID user tertentu, atau Anda bisa langsung menggunakan ID yang sesuai
        // $notulisId = User::where('name', 'Notulis Name')->first()->id;

        // // Menambahkan data surat ke tabel letters
        // Letter::create([
        //     'letter_type_id' => $letterTypeId,
        //     'letter_perihal' => 'Contoh Perihal Surat',
        //     'recipients' => json_encode(['Pak Hasan']),
        //     'content' => 'Isi surat...',
        //     'attachment' => 'file', // Gantilah dengan path file yang sesuai
        //     'notulis' => $notulisId,
        // ]);

        
        // Tambahkan data surat lainnya jika diperlukan
        // ...

        // Output pesan bahwa seeder berhasil dijalankan
        // $this->command->info('Letters table seeded successfully.');

        // // Mendapatkan objek LetterType berdasarkan 'name_type'
        // $letterType = LetterType::where('name_type', 'Rapat Libur')->first();

        // // Mengecek apakah objek LetterType ditemukan
        // if ($letterType) {
        //     // Mendapatkan ID dari objek LetterType
        //     $letterTypeId = $letterType->id;

        //     // Mendapatkan ID user tertentu, atau Anda bisa langsung menggunakan ID yang sesuai
        //     $notulis = User::where('name', 'Pak Hasan')->get();

        //     // Menambahkan data surat ke tabel letters
        //     Letter::create([
        //         'letter_type_id' => $letterTypeId,
        //         'letter_perihal' => 'Rapat Libur',
        //         'content' => 'Isi surat...',
        //         // 'attachment' => 'file_path.pdf', // Gantilah dengan path file yang sesuai
        //         'notulis' => $notulis,
        //     ]);

        //     // Tambahkan data surat lainnya jika diperlukan
        //     // ...

        //     // Output pesan bahwa seeder berhasil dijalankan
        //     $this->command->info('Letters table seeded successfully.');
        // } else {
        //     // Output pesan jika LetterType tidak ditemukan
        //     $this->command->error('LetterType "Rapat Libur" not found.');
        // }

        // Menggunakan Faker untuk data acak
        
    }
}
