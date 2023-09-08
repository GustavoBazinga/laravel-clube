<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'form_id',
        'number',
        'name',
        'created_at',
        'updated_at',
    ];
    public function form()
    {
        return $this->belongsTo(Form::class);
    }
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

}
