<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Request;
use App\Models\Question;
use App\Models\Option;

class Answer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'request_id',
        'question_id',
        'option_id',
        'answer',
        'created_at',
        'updated_at',
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
    public function option()
    {
        return $this->belongsTo(Option::class);
    }

}
