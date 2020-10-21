<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Swimmer;

class SwimmerController extends Controller
{
    public function index()
    {
        $swimmer = Swimmer::all();
    }
}
