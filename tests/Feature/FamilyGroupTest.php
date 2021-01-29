<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Str;
use Tests\TestCase;

class FamilyGroupTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_family_group_can_be_created()
    {

        $this->withoutExceptionHandling();
        
        $response = $this->post('/family-group/store', array_merge($this->data(), ['slug' => Str::slug(request('family_name'))]));
        $response->assertOk();

        $this->assertCount(1, FamilyGroup::all());
    }

    public function data()
    {
        return [
            'family_name' => 'Johnson',
            'address_line' => '47 Fernley Road',
            'place' => 'Birmingham',
            'postcode' => 'B11 3NS',
            'contact_number' => '07 345 678 890445',
            'email' => 'thejohnsons@crsc.com',
        ];
    }
}