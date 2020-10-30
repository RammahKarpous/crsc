<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Meet;
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
        $meet = Meet::first();

        $response = $this->post('/events/store', [
            'age_range' => 'Seniors',
            'gender' => 'Female',
            'distance' => 3,
            'stroke' => 'Breaststroke',
            'round' => 12
        ]);

        $response->assertOk();

        $this->assertCount(1, Event::all());
    }
}