<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function store()
    {
        Event::create($this->validateData());
    }

    public function validateData()
    {
        return request()->validate([
            'age_range' => 'required',
            'gender' => 'required',
            'distance' => 'required',
            'stroke' => 'required',
            'round' => 'required'
        ]);
    }
}