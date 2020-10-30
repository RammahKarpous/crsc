<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\Swimmer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SwimmerManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_club_official_can_add_a_swimmer() {

        
        $famGroup = FamilyGroup::first();

        $swimmer = $this->post('/swimmers', [
            'name' => 'Swimmer',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);
        
        $this->assertCount(1, Swimmer::all());
    }

    // /** @test */
    public function a_club_official_can_update_a_swimmer_name()
    {
        $this->withoutExceptionHandling();

        $famGroup = FamilyGroup::first();

        $this->post('/swimmers', [
            'name' => 'Swimmer',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);

        $swimmer = Swimmer::first();

        $response = $this->patch('/swimmers/' . $swimmer->id, [
            'name' => 'Bob',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);

        $this->assertEquals('Bob', Swimmer::first()->name);
    }  
}