<?php

namespace Tests\Feature;

use App\Models\Meet;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class MeetManagementTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_club_official_can_create_a_meet()
    {
        
        $event = $this->post('/meets/store', [
            'name' => 'Rammah new meet',
            'venue' => 'My venue',
            'date' => '11/24/2020',
            'pool_length' => 6
        ]);

        $event->assertOk();

        $meet = Meet::all();

        $this->assertCount(1, $meet);
        $this->assertInstanceOf(Carbon::class, $meet->first()->date);
    }
}