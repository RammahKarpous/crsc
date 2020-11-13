<?php

namespace App\Http\Controllers;

use App\Models\FamilyGroup;
use Illuminate\Http\Request;
use App\Models\Swimmer;

class SwimmerController extends Controller
{

    public function create(FamilyGroup $familyGroup)
    {
        return view('swimmers.create', ['group' => $familyGroup]);
    }

    public function store()
    {
        $this->validateData();
        Swimmer::create([
            'family_group_id' => request('group_id'),
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => request('dob'),
            'password' => request('name'),
            'status_id' => request('status_id')
        ]);

        return redirect()->back();
    }

    public function update(Swimmer $swimmer)
    {
        $swimmer->update($this->validateData());
    }

    public function validateData()
    {
        return request()->validate([
            'group_id' => 'nullable',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'password' => 'required',
            'status' => 'required'
        ]);
    }
}