<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'name', 
        'email', 
        'test_remaining', 
        'is_admin', 
        'created_at',
    ];
}
