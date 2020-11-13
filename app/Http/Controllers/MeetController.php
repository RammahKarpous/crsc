<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function store()
    {
        Meet::create($this->validateData());
    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'slug' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'pool_length' => 'required'
        ]);
    }
}