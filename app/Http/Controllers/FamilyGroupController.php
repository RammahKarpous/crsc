<?php

namespace App\Http\Controllers;

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
    
    public function store()
    {

        // $data = $this->validateData();

        FamilyGroup::create([
            'family_name' => request('family_name'),
            'address_line' => request('address_line'),
            'place' => request('place'),
            'postcode' => request('postcode'),
            'contact_number' => request('contact_number'),
            'email' => request('email')
        ]);
        
    }

    public function validateData()
    {
        // return request()->validate();
    }
}