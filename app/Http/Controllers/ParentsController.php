<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function store()
    {
        Parents::create([
            'group_id' => request('group_id'),
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => request('dob')
        ]);
    }
}
