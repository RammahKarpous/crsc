<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\Meet;
use App\Models\Parents;
use App\Models\Swimmer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ClubOfficialFunctionalitiesTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_club_official_can_add_a_family_group()
    {

        $this->withoutExceptionHandling();
        
        $response = $this->post('/family', [
            'family_name' => 'Johnson',
            'address_line' => '47 Fernley Road',
            'place' => 'Birmingham',
            'postcode' => 'B11 3NS',
            'contact_number' => '07 345 678 890445',
            'email' => 'thejohnson@gmail.com'
        ]);

        $response->assertOk();

        $this->assertCount(1, FamilyGroup::all());
    }

    /** @test*/
    public function a_club_official_can_add_a_parent() {

        $this->a_club_official_can_add_a_family_group();

        $parent = $this->post('/parents', [
            'group_id' => FamilyGroup::first()->id,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'active'
        ]);

        $parent->assertOk();
        
        $this->assertCount(1, Parents::all());
    }

    /** @test */
    public function parents_information_is_required()
    {

        $parent = $this->post('/parents', [
            'group_id' => null,
            'name' => 'Parent name',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);

        $parent->assertSessionHasErrors(['group_id']);
    }

    /** @test */
    public function a_club_official_can_add_a_swimmer() {

        $this->a_club_official_can_add_a_family_group();
        
        $famGroup = FamilyGroup::first();

        $swimmer = $this->post('/swimmers', [
            'group_id' => $famGroup->id,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);
        
        $this->assertCount(1, Swimmer::all());
    }

    /** @test */
    public function a_club_official_can_create_a_meet()
    {
        
        $this->withoutExceptionHandling();

        $event = $this->post('/meets', [
            'name' => 'Rammah\'s new meet',
            'venue' => 'My venue',
            'date' => now(),
            'pool_length' => 6
        ]);

        $event->assertOk();

        $this->assertCount(1, Meet::all());
    }

    /** @test */
    public function a_club_official_can_edit_a_parent_name()
    {
        $this->a_club_official_can_add_a_family_group();    

        $famGroup = FamilyGroup::first();

        $this->post('/parents', [
            'group_id' => $famGroup->id,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);

        $parent = Parents::first();

        $response = $this->patch('/parent/' . $parent->id, [
            'group_id' => $famGroup->id,
            'name' => 'New parent',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);

        $this->assertEquals('New parent', Parents::first()->name);
    }

    /** @test */
    public function a_club_official_can_archive_a_parent()
    {
        $this->a_club_official_can_add_a_family_group();

        $famGroup = FamilyGroup::first();

        $this->post('/parents', [
            'group_id' => $famGroup->id,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'active'
        ]);

        $parent = Parents::first();

        $response = $this->patch('/parent/' . $parent->id, [
            'group_id' => $famGroup->id,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'archived'
        ]);

        $this->assertEquals('archived', Parents::first()->status);
    }
}