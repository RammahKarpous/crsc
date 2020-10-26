<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swimmer;

class SwimmerController extends Controller
{
    public function store()
    {
        $data = $this->validateData();

        Swimmer::create($data);
    }

    public function update(Swimmer $swimmer)
    {
        $data = $this->validateData();

        $swimmer->update($data);
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