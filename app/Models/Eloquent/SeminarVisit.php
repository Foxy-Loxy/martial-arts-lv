<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class SeminarVisit extends Model
{
    protected $fillable = [
        'seminar_id',
        'trainee_id',
    ];

    public function seminar()
    {
        return $this->belongsTo(Seminar::class);
    }

    public function trainee()
    {
        return $this->belongsTo(Trainee::class);
    }
}
