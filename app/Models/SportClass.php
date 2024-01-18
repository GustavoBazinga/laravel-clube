<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SportClass extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sport_classes';


    protected $fillable = [
        'name',
        'description',
        'professor_id',
        'sport_id',
        'hour',
        'day',
        'slots',
        'price'
    ];

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }
}
