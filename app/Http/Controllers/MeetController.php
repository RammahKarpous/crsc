<?php

namespace App\Http\Controllers;

use App\Models\AgeRange;
use App\Models\Meet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MeetController extends Controller
{
    public function index()
    {
        return view('meets.index', $this->getQuery());
    }

    public function create()
    {
        return view('meets.create');
    }

    public function show(Meet $meet)
    {
        return view('meets.show', [
            'meet' => $meet,
            'age_ranges' => AgeRange::all(),
        ]);
    }

    public function edit(Meet $meet)
    {
        return view('meets.edit', ['meet' => $meet]);
    }

    public function store()
    {
        Meet::create(array_merge($this->validateData(), ['slug' => Str::slug(request('name'))]));
        return redirect()->route('meets.index', $this->getQuery());
    }
    
    public function update(Meet $meet)
    {
        $meet->update(array_merge($this->validateData(), ['slug' => Str::slug(request('name'))]));
        return redirect()->route('meets.index', ['meets' => Meet::all()]);
    }

    public function filterMeet()
    {

        $from_date = Carbon::parse(request('from_date'));
        $to_date = Carbon::parse(request('to_date'));

        if (request('venue')) {
            return view('meets.index', [
                'meets' => Meet::venue()->dateRange($from_date, $to_date)->get(),
                'venues' => Meet::all()->unique('venue'),
                'venue' => request('venue'),
                'from_date' => $from_date,
                'to_date' => $to_date,
            ]);
        } else {
            return view('meets.index', [
                'meets' => Meet::dateRange($from_date, $to_date)->get(),
                'venues' => Meet::all()->unique('venue'),
                'venue' => request('venue'),
                'from_date' => $from_date,
                'to_date' => $to_date,
            ]);
        }

    }

    private function getQuery()
    {
        return [
            'meets' => Meet::orderBy('date', 'asc')->get(),
            'venues' => Meet::all()->unique('venue'),
            'venue' => '',
            'from_date' => now(),
            'to_date' => $this->getDate(),
        ];
    }

    public function getDate()
    {
        if (count(Meet::all()) > 0) {
            return Meet::orderBy('date', 'desc')->first()->date;
        } else {
            return now();
        }
    }

    private function validateData()
    {
        return request()->validate([
            'name' => 'required',
            'venue' => 'required',
            'date' => 'required|date',
            'pool_length' => 'required',
        ]);
    }
}