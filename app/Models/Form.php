<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Form extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'title',
        'created_at',
        'updated_at',
    ];

    protected static function boot(){
        parent::boot();
        static::addGlobalScope('questions', function (Builder $builder) {
            $builder->with('questions.options');
            $builder->orderBy('id', 'asc');

        });
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
    public function requests(): HasMany
    {
        return $this->hasMany(Request::class);
    }

}
