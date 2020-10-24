<?php

namespace App\Http\Controllers;

use App\Models\FamilyGroup;
use Illuminate\Http\Request;

class FamilyGroupController extends Controller
{
    public function store()
    {
        FamilyGroup::create([
            'family_name' => request('family_name'),
            'address_line' => request('address_line'),
            'place' => request('place'),
            'postcode' => request('postcode'),
            'contact_number' => request('contact_number'),
            'email' => request('email')
        ]);
    }
}
