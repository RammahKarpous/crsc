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
        $digits = 5;
        
        Event::create(array_merge($this->validateData(), [
            'meet_id' => request('meet_id'), 
            'slug' => 'event-' . rand(pow(10, $digits-1), pow(10, $digits)-1)
        ]));

        return redirect()->back()->with('success', 'An event has been added.');
    }

    public function show(Event $event)
    {
        return view('events.show', ['event' => $event]);
    }

    public function update(Event $event)
    {
        $digits = 5;
        
        $event->update(array_merge($this->validateData(), [
            'meet_id' => request('meet_id'), 'slug' => 
            'event-' . rand(pow(10, $digits-1), pow(10, $digits)-1)
        ]));

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

    public function attachSwimmers()
    {        

        $participants = request('is-participating');
        $selectedLanes = request('selected-lane');

        for ($i=0; $i < count($participants); $i++) { 

            User::where('id', request('is-participating')[$i])
                ->update([
                    'event_id' => request('event_id'),
                    'lane' => $selectedLanes[$i]
                ]);
        }
 
        return redirect()->route('events.show', request('slug'))->with('success', 'The swimmer(s) has/have been added to the event.');
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