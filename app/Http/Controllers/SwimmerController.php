<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swimmer;

class SwimmerController extends Controller
{
    public function store()
    {
        Swimmer::create([
            'group_id' => request('group_id'),
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => request('dob')
        ]);
    }
}