<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    protected $fillable = [
        'when',
        'branch_id',
    ];

    protected $casts = [
        'when' => 'datetime',
    ];

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function trainees()
    {
        return $this->hasManyThrough(Trainee::class, ExamPass::class, 'exam_id', 'id', 'id', 'trainee_id');
    }

    public function passes()
    {
        return $this->hasMany(ExamPass::class);
    }
}
