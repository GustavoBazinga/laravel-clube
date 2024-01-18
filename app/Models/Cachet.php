<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cachet extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $fillable = [
        'worker_id',
        'event_id',
        'start_time',
        'end_time',
        'cash',
        'role_id'
    ];

    public function worker()
    {
        return $this->belongsTo(Worker::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    
}
