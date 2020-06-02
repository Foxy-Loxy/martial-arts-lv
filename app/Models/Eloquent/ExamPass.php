<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class ExamPass extends Model
{
    protected $fillable = [
        'exam_id',
        'trainee_id',
        'commentary',
        'result',
    ];

    public function exam()
    {
        return $this->belongsTo(Exam::class);
    }

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
