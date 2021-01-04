<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'family_group_id',
        'member_type_id',
        'event_id',
        'name',
        'slug',
        'email',
        'gender',
        'dob',
        'password',
        'lane',
        'result',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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