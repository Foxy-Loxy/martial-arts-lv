<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Seminar extends Model
{
    protected $fillable = [
        'branch_id',
        'when',
        'name',
        'description',
        'protocol',
    ];

    protected $casts = [
        'when' => 'datetime',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function visits()
    {
        return $this->hasMany(SeminarVisit::class);
    }
}
