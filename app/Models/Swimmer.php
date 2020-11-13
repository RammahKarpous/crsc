<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Swimmer extends Model
{
    use HasFactory;

    public $guarded = [];

    protected $dates = ['dob'];

    public function setDateAttribute($date)
    {
        $this->attributes['dob'] = Carbon::parse($date);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}