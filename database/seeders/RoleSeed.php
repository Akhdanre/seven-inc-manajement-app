<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            "name" => "kaprodi"
        ]);
        Role::create([
            "name" => "dosen"
        ]);
        Role::create([
            "name" => "mahasiswa"
        ]);
    }
}
