<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['dob'];

    public function setDateAttribute($date)
    {
        $this->attributes['dob'] = Carbon::parse($date);
    }

    public function family_group()
    {
        return $this->belongsTo(FamilyGroup::class);
    }    

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function member_type()
    {
        return $this->belongsTo(MemberType::class);
    }

    public function event()
    {
        return $this->belongsTo(MemberType::class);
    }
}