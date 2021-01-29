<?php

namespace Tests\Feature;

use App\Models\AgeRange;
use App\Models\Event;
use App\Models\EventInfo;
use App\Models\Meet;
use App\Models\Swimmer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EventManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_club_official_can_create_an_event()
    {        
        $this->withoutExceptionHandling();
        
        $meet = Meet::factory()->create();
        $ageRange = AgeRange::factory()->create();

        $this->assertCount(1, AgeRange::all());
        // dd($ageRange);

        $response = $this->post('/events/store', $this->data());

        $response->assertOk();

        // $this->assertCount(1, Event::all());
        // $this->assertEquals($ageRange->id, Event::first()->age_range_id);
        $this->assertEquals($meet->id, Event::first()->meet_id);
    }

    // /** @test */
    public function a_swimmer_can_be_added_to_an_event()
    {
        // $this->withoutExceptionHandling();
        
        $event = Event::factory()->create();
        $swimmer = User::factory()->create();

        $response = $this->post('/events/' . $event->id, [
            'swimmer_id' => $swimmer->id,
            'lane' => random_int(0,22),
            'round' => random_int(0,22)
        ]);

        $response->assertOk();

        $this->assertEquals($swimmer->id, Event::first()->swimmer_id);
    }

    // /** @test */
    public function a_club_official_can_update_an_event()
    {
        $this->withoutExceptionHandling();
        
        $this->post('/events/store', [
            'age_range' => 'Seniors',
            'gender' => 'Female',
            'distance' => 3,
            'stroke' => 'Breaststroke',
            'round' => 12
        ]);

        $event = Event::first();

        $response = $this->patch('/events/' . $event->id, [
            'age_range' => 'Seniors',
            'gender' => 'Female',
            'distance' => 3,
            'stroke' => 'Breaststroke',
            'round' => 23
        ]);

        $response->assertOk();

        $this->assertEquals(1, Event::first()->id);
        $this->assertEquals(23, Event::first()->round);
    }

    public function data()
    {
        return [
            'meet_id' => 1,
            'age_range_id' => 2,
            'start_time' => '13:00:00',
            'end_time' => '14:00:00',
            'slug' => 'event-34534',
            'gender' => 'Female',
            'distance' => 3,
            'stroke' => 'Breaststroke',
            'round' => 12
        ];
    }
}