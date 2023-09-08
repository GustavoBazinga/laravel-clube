<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Option extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'question_id',
        'option',
        'next_question_id',
        'created_at',
        'updated_at',
    ];
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
    public function nextQuestion()
    {
        return $this->belongsTo(Question::class, 'next_question_id');
    }
}
