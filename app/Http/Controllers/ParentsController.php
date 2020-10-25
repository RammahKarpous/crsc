<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function store()
    {

        $data = request()->validate([
            'group_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date'
        ]);

        Parents::create($data);
    }
}