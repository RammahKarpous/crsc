<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function store()
    {

        Meet::create([
            'name' => request('name'),
            'venue' => request('venue'),
            'date' => request('date'),
            'pool_length' => request('pool_length')
        ]);
    }
}