<?php

namespace App\Http\Controllers;

use App\Models\FamilyGroup;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('parents.index', [
            'parents' => User::all()
        ]);
    }

    public function create(FamilyGroup $familyGroup)
    {
        return view('members.create', ['group' => $familyGroup]);
    }

    public function store()
    {
        $this->validateData();
        User::create($this->data());

        return redirect()->back()->with('success', 'Member has been added');
    }

    public function update(User $user)
    {
        $this->validateData();
        $user->update($this->data());

        return redirect()->back()->with('success', 'Member has been updated');
    }

    protected function validateData()
    {
        return request()->validate([
            'family_group_id' => 'nullable',
            'member_type_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'password' => 'nullable',
            'status_id' => 'required'
        ]);
    }

    public function data()
    {

        $digits = 5;

        if(request('member_type_id') == 2) {
            return [
                'family_group_id' => request('group_id'),
                'member_type_id' => request('member_type_id'),
                'name' => request('name'),
                'email' =>  substr(request('name'), 0, 1) . rand(pow(10, $digits-1), pow(10, $digits)-1) . substr(request('family_name'), 0, 1) . '@crsc.com',
                'gender' => request('gender'),
                'dob' => request('dob'),
                'password' => Hash::make(request('name')),
                'status_id' => request('status_id')
            ];
        } else {
            return [
                'family_group_id' => request('group_id'),
                'member_type_id' => request('member_type_id'),
                'name' => request('name'),
                'email' =>  request('email'),
                'gender' => request('gender'),
                'dob' => request('dob'),
                'password' => Hash::make(request('name')),
                'status_id' => request('status_id')
            ];
        }
    }
}