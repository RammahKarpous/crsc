<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(Member::class);
    }

    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }

    public function age_range()
    {
        return $this->belongsTo(AgeRange::class);
    }
}