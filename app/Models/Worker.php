<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Worker extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'cpf',
        'register',
        'admission_date',
        'telephone',
        'email'
    ];

    public function cachets()
    {
        return $this->hasMany(Cachet::class);
    }
}
