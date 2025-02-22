<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServerProject extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'path',
        'branch',
        'server_id'
    ];

    public $timestamps = true;
}
