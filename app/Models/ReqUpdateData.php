<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqUpdateData extends Model
{
    use HasFactory;

    protected $table = "req_update_data";
    protected $primaryKey = "id";
    protected $typeKey = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        "kelas_id",
        "mahasiswa_id",
        "keterangan"
    ];
}
