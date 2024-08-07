<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Users extends Model
{
    use HasFactory;

    protected $table = "users";
    protected $primaryKey = "id";
    protected $typeKey = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        "username",
        "email",
        "password",
        "role_id"
    ];


    public function role(): HasOne
    {
        return $this->hasOne(Role::class, "role_id", "id");
    }
}
