<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Form;
use App\Models\Answer;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'form_id',
        'number',
        'name',
        'area',
        'type',
        'created_at',
        'updated_at',
    ];

    
    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(Answer::class);
    }

}
