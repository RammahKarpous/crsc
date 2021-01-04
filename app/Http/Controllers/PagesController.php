<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('welcome', [
            'events' => Event::all(),
            'time' => Carbon::parse(now())->format('h:m:s'),
            'date' => Carbon::parse(now())->format('Y-m-d')
        ]);
    }
}