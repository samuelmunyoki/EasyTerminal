<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    use HasFactory;
    protected $table = 'servers';
    protected $primaryKey = 'id';
    protected $fillable = [
        'server_name', 'server_ip', 'server_username', 'server_port', 'server_password', 'user_id'
    ];
}
