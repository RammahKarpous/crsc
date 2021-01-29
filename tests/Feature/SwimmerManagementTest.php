<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class SwimmerManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_club_official_can_add_a_swimmer() {
        
        $famGroup = FamilyGroup::first();

        $swimmer = $this->post('/family-group/'. $famGroup->id .'/create-member', $this->data());
        
        $this->assertCount(1, User::all());
    }

    // /** @test */
    public function a_swimmer_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->post('/swimmers', $this->data());

        $swimmer = User::first();
        $response = $this->patch('/swimmers/' . $swimmer->id, array_merge($this->data(), ['name' => 'Jacky']));
        
        $this->assertEquals('Jacky', User::first()->name);
    }

    public function data()
    {
        return [
            'name' => 'Swimmer',
            'slug' => 'swimmer',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ];
    }
}