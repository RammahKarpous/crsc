<?php

namespace App\Http\Controllers;

use App\Models\FamilyGroup;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return view('parents.index', [
            'parents' => Member::all()
        ]);
    }

    public function create(FamilyGroup $familyGroup)
    {
        return view('members.create', ['group' => $familyGroup]);
    }

    public function store()
    {
        
        $this->validateData();
        Member::create([
            'family_group_id' => request('group_id'),
            'member_type_id' => request('member_type_id'),
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => request('dob'),
            'password' => request('name'),
            'status_id' => request('status_id')
        ]);

        return redirect()->back()->with('success', 'Member has been added');
    }

    public function update(Member $member)
    {
        $this->validateData();
        $member->update([
            'family_group_id' => request('group_id'),
            'member_type_id' => request('member_type_id'),
            'name' => request('name'),
            'gender' => request('gender'),
            'dob' => request('dob'),
            'password' => request('name'),
            'status_id' => request('status_id')
        ]);

        return redirect()->back()->with('success', 'Member has been updated');
    }

    /**
     * 
     * @return mixed
     * 
     */
    protected function validateData()
    {
        return request()->validate([
            'family_group_id' => 'nullable',
            'member_type_id' => 'required',
            'name' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'password' => 'nullable',
            'status_id' => 'required'
        ]);
    }
}