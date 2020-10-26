<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swimmer;

class SwimmerController extends Controller
{
    public function store()
    {
        Swimmer::create($this->validateData());
    }

    public function update(Swimmer $swimmer)
    {
        $swimmer->update($this->validateData());
    }

    public function validateData()
    {
        return request()->validate([
            'group_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'status' => 'required'
        ]);
    }
}