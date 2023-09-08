<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'form_id',
        'type',
        'question',
        'created_at',
        'updated_at',
    ];

    public function form()
    {
        return $this->belongsTo(Form::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class);
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
