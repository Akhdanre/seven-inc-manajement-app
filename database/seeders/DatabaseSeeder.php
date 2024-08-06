<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use App\Models\Users;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(RoleSeed::class);
        Users::factory(20)->create();
        Kelas::factory(2)->create();
        Mahasiswa::factory(20)->create();

        // $this->
    }
}
