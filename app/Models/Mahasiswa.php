<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = "mahasiswas";
    protected $primaryKey = "id";
    protected $typeKey = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        "user_id",
        "kelas_id",
        "nim",
        "name",
        "birth_place",
        "birth_date",
        "edit_status"
    ];

    public function kelas(): HasOne
    {
        return $this->hasOne(Kelas::class, "id",  "kelas_id");
    }
}
