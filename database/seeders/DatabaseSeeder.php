<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {

        Kelas::create([
            "id" => 0,
            "name" => "-",
            "kapasitas" => 0
        ]);
        $this->call([RoleSeed::class, UserSeed::class]);


        // User::factory(20)->create();
        // Kelas::factory(2)->create();
        // Mahasiswa::factory(20)->create();

        // $this->
    }
}
