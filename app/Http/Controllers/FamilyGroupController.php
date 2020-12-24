<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\FamilyGroup;
use Illuminate\Http\Request;

class FamilyGroupController extends Controller
{

    public function __constructor()
    {
        $this->middleware('auth');
    }

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
        FamilyGroup::create(array_merge($this->validateData(), ['slug' => Str::slug(request('family_name'))]));
        return redirect()->route('family-group.index');
    }

    public function edit(FamilyGroup $familyGroup)
    {
        return view('family-group.edit', ['group' => $familyGroup]);
    }

    public function update(FamilyGroup $familyGroup)
    {
        $familyGroup->update(array_merge($this->validateData(), ['slug' => Str::slug(request('family_name'))]));
        return redirect()->route('family-group.edit', $familyGroup->slug);
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