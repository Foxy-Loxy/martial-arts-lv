<?php

namespace App\Models\Eloquent;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        'name',
    ];

    public function branches()
    {
        return $this->hasMany(Branch::class);
    }
}
