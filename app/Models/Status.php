<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public function parent()
    {
        return $this->hasOne(Parents::class);
    }

    public function swimmer()
    {
        return $this->hasOne(Swimmer::class);
    }
}