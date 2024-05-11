<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestHistory extends Model
{
    use HasFactory;
    protected $table = 'test_history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 
        'packet_id', 
        'listening_score', 
        'structure_score', 
        'reading_score', 
        'created_at',
        'user_id',
    ];
}
