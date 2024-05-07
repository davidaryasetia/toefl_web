<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestAnswer extends Model
{
    use HasFactory;
    protected $table='test_answer';
    protected $primaryKey='id';
    protected $fillable=[
        'question_id', 
        'answer', 
        'is_correct', 
        'created_at'
    ];
}
