<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $fillable = [
        'school_id',
        'name',
    ];

    public function school()
    {
        return $this->belongsTo(School::class);
    }

    public function trainers()
    {
        return $this->hasMany(Trainer::class);
    }
}
