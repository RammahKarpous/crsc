<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function store()
    {

        $data = $this->validateData();

        Parents::create($data);
    }

    public function update(Parents $parent)
    {

        $data = $this->validateData();

        $parent->update($data);
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