<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminModel extends Authenticatable
{
    protected $table = "admin";
    protected $fillable = [
        "email",
        "password"
    ];
    public $timestamped = false;

    protected $hidden = [
        "password",
    ];
    use HasFactory;
}
