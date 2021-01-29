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
        return $this->hasMany(User::class);
    }

    public function meet()
    {
        return $this->belongsTo(Meet::class);
    }

    public function age_range()
    {
        return $this->belongsTo(AgeRange::class);
    }

    // Scopes
    public function scopeAgeRange($query)
    {
        $query->where('age_range_id', request('age_range_id'));
    }

    public function scopeGender($query)
    {
        $query->where('gender', request('gender'));
    }

    public function scopeDistance($query)
    {
        $query->where('distance', request('distance'));
    }
}