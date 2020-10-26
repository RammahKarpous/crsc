<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    public function store()
    {
        Parents::create($this->validateData());
    }

    public function update(Parents $parent)
    {
        $parent->update($this->validateData());
    }

    /**
     * 
     * @return mixed
     * 
     */
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