<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\Parents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClubOfficialFunctionalitiesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_club_official_can_add_a_family_group()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/family-group', [
            'family_name' => 'Johnson',
            'address_line' => '47 Fernley Road',
            'place' => 'Birmingham',
            'postcode' => 'B11 3NS',
            'contact_number' => '07 345 678 890',
            'email' => 'thejohnson@gmail.com'
        ]);

        $response->assertOk();

        $this->assertCount(1, FamilyGroup::all());
    }

    

    /** @test*/
    public function a_club_official_can_add_a_parent() {

        $this->withoutExceptionHandling();

        $fg = FamilyGroup::first();

        // dd($fg->id);

        $response = $this->post('/members', [
            'group_id' => $fg->id,
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988'
        ]);
        
        $response->assertOk();

        $this->assertCount(1, Parents::all());
        // $this->assertEquals($fg->id, );
    }
}