<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ServerProject;

class Server extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'host',
        'ssh_username',
        'pem_file',
        'git_username',
        'git_password',
        'admin_id',
        'user_id',
        'status',
    ];

    protected $casts = [
        'git_password' => 'encrypted',
    ];

    protected $hidden = [
        'git_password',
    ];

    // Relationship with ServerProject
    public function projects()
    {
        return $this->hasMany(ServerProject::class);
    }
}
