<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Trainee extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'bday',
        'trainer_id',
        'level',
        'level_type',
    ];

    protected $casts = [
        'bday' => 'datetime',
    ];

    public function trainer()
    {
        return $this->belongsTo(Trainer::class);
    }

    public function examPasses()
    {
        return $this->hasMany(ExamPass::class);
    }

    public function visitedSeminars()
    {
        return $this->hasManyThrough(Seminar::class, SeminarVisit::class, 'trainee_id', 'id', 'id', 'seminar_id');
    }
}
