<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestQuestion extends Model
{
    use HasFactory;
    protected $table = 'test_question';
    protected $primaryKey = 'id';
    protected $fillable = [
        'question', 
        'type_id', 
        'created_at', 
        'packet_id', 
        'url'
    ];
}
