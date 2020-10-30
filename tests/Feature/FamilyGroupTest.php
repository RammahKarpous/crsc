<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\FamilyGroup;
use App\Models\Meet;
use App\Models\Parents;
use App\Models\Swimmer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class FamilyGroupTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_club_official_can_add_a_family_group()
    {
        
        $response = $this->post('/family/store', [
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
}