<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Meet;
use App\Models\Member;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function create(Meet $meet)
    {
        return view('events.create', ['meet' => $meet]);
    }

    public function store()
    {        
        $this->validateData();
        Event::create($this->data());
        return redirect()->back()->with('success', 'An event has been added.');
    }

    public function update(Event $event)
    {
        $this->validateData();
        $event->update($this->data());
        return redirect()->back()->with('success', 'An event has been updated.');
    }

    public function addSwimmers(Event $event)
    {
        if ($event->age_range_id == 1) {
        
            $minAge = 15;

            $maxDate = Carbon::today()->subYears($minAge)->endOfDay();

            $swimmers = User::where([
                ['member_type_id', '=', 2],
                ['gender', '=', $event->gender],
                ['dob', '>=', $maxDate]
            ])->get();

            return view('events.add-swimmers', ['swimmers' => $swimmers, 'event' => $event]);
        } else if ($event->age_range_id == 2) {
            $minAge = 13;
            $maxAge = 17;

            $minDate = Carbon::today()->subYears($maxAge);
            $maxDate = Carbon::today()->subYears($minAge)->endOfDay();

            $swimmers = User::where([
                ['member_type_id', '=', 2],
                ['gender', '=', $event->gender]
            ])->whereBetween('dob', [$minDate, $maxDate])->get();

            return view('events.add-swimmers', ['swimmers' => $swimmers, 'event' => $event]);
        }
    }

    public function data()
    {
        $digits = 5;

        return [
            'meet_id' => request('meet_id'),
            'age_range_id' => request('age_range_id'),
            'start_time' => request('start_time'),
            'end_time' => request('end_time'),
            'slug' => 'event-' . rand(pow(10, $digits-1), pow(10, $digits)-1),
            'gender' => request('gender'),
            'distance' => request('distance'),
            'stroke' => request('stroke'),
            'round' => request('round')
        ]; 
    }

    protected function validateData()
    {
        return request()->validate([
            'age_range_id' => 'required',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|after_or_equal:start_time|date_format:H:i',
            'gender' => 'required',
            'distance' => 'required',
            'stroke' => 'required',
            'round' => 'required'
        ]);
    }
}