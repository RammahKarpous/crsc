<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\FamilyGroup;
use Illuminate\Http\Request;

class FamilyGroupController extends Controller
{

    public function index()
    {
        return view('family-group.index', [
            'groups' => FamilyGroup::all()
        ]);
    }

    public function create()
    {
        return view('family-group.create');
    }

    public function show(FamilyGroup $familyGroup)
    {
        return view('family-group.show', ['group' => $familyGroup]);
    }
    
    public function store()
    {
        $this->validateData();

        FamilyGroup::create($this->data());

        return redirect()->route('family-group.index');
    }

    public function edit(FamilyGroup $familyGroup)
    {
        return view('family-group.edit', ['group' => $familyGroup]);
    }

    public function update(FamilyGroup $familyGroup)
    {
        $this->validateData();
        $familyGroup->update($this->data());

        return redirect()->route('family-group.edit', $familyGroup->slug);
    }

    public function data()
    {
        return [
            'family_name' => request('family_name'),
            'slug' => Str::slug(request('family_name')),
            'address_line' => request('address_line'),
            'place' => request('place'),
            'postcode' => request('postcode'),
            'contact_number' => request('contact_number'),
            'email' => request('email'),
        ];
    }

    public function validateData()
    {
        return request()->validate([
            'family_name' => 'required',
            'address_line' => 'required',
            'place' => 'required',
            'postcode' => 'required',
            'contact_number' => 'required',
            'email' => 'required'
        ]);
    }
}