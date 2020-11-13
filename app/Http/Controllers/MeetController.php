<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MeetController extends Controller
{
    public function index()
    {
        return view('meets.index', ['meets' => Meet::all()]);
    }

    public function create()
    {
        return view('meets.create');
    }

    public function show(Meet $meet)
    {
        return view('meets.show', ['meet' => $meet]);
    }

    public function edit(Meet $meet)
    {
        return view('meets.edit', ['meet' => $meet]);
    }

    public function store()
    {
        $this->validateData();
        Meet::create($this->data());

        return view('meets.index');
    }

    public function update(Meet $meet)
    {
        $this->validateData();
        $meet->update($this->data());

        return redirect()->route('meets.index', ['meets' => Meet::all()]);
    }

    public function data()
    {
        return [
            'name' => request('name'),
            'slug' => Str::slug(request('name')),
            'venue' => request('venue'),
            'date' => request('date'),
            'pool_length' => request('pool_length')
        ];
    }

    public function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'pool_length' => 'required'
        ]);
    }
}