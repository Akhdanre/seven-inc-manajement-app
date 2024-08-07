<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = "dosens";
    protected $primaryKey = "id";
    protected $typeKey = "int";
    public $timestamps = true;
    public $incrementing = true;


    protected $fillable = [
        "user_id",
        "kelas_id",
        "kode_dosen",
        "nip",
        "name",
        "role_id"
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class, 'id');
    }
}
