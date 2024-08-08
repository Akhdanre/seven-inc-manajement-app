<?php

namespace Database\Seeders;

use App\Models\Dosen;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder {
    /**
     * Run the database seeds.
     */
    public function run(): void {


        $userKaprodi =  User::create(
            [
                "email" => "kaprodi@gmail.com",
                "username" => "kaprodiAdmin",
                "password" => '$2y$10$CPvgT/MbTXg0AkIMN6AhA.kwUVqTDhMz5Tz8pp7GLgi6y0I/opSMa',
                "role_id" => 1
            ]
        );



        Dosen::create(
            [
                "user_id" => $userKaprodi->id,
                "kode_dosen" => 19234,
                "nip" => "kd9923972398",
                "name" => "kaprodi admin",
                "role_id" => 1,
            ]
        );

        $userDosen =  User::create(
            [
                "email" => "dosen@gmail.com",
                "username" => "dosenAdmin",
                "password" => '$2y$10$CPvgT/MbTXg0AkIMN6AhA.kwUVqTDhMz5Tz8pp7GLgi6y0I/opSMa',
                "role_id" => 2
            ]
        );

        $kelasDosen = Kelas::create([
            "name" => "Manajement Informatika",
            "kapasitas" => 20,
        ]);

        Dosen::create(
            [
                "user_id" => $userDosen->id,
                "kelas_id" => $kelasDosen->id,
                "kode_dosen" => 19234,
                "nip" => "kd9923972398",
                "name" => "dosen admin",
                "role_id" => 2,
            ]
        );
    }
}
