<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventInfo extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function swimmer()
    {
        return $this->belongsTo(Swimmer::class);
    }
}