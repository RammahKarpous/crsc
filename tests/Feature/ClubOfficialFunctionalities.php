<?php

namespace Tests\Feature;

use App\Models\Parents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClubOfficialFunctionalities extends TestCase
{
    /** @test*/
    public function a_club_official_can_add_parent() {

        $this->withoutExceptionHandling();

        $reponse = $this->post('/members', [
            'group_id' => 1,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988'
        ]);

        $reponse->assertOk();

        $this->assertCount(1, Parents::all());
    }
}
