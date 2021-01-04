<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meet extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['date'];

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::parse($date);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    // Scopes
    public function scopeVenue($query)
    {
        return $query->where('venue', request('venue'));
    }

    public function scopeDateRange($query)
    {
        return $query->where('venue', request('venue'));
    }
}