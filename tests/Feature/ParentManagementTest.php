<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\Parents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ParentManagementTest extends TestCase
{

    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test*/
    public function a_club_official_can_add_a_parent() {

        $parent = $this->post('/parents', [
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'active'
        ]);
        
        $this->assertCount(1, Parents::all());
    }

    /** @test */
    public function parents_information_is_required()
    {

        $parent = $this->post('/parents', [
            'name' => '',
            'gender' => 'Female',
            'dob' => '1998-09-23',
            'status' => 'active'
        ]);

        $parent->assertSessionHasErrors(['name']);
    }

    // /** @test */
    public function a_club_official_can_edit_a_parent_name()
    {
                
        $this->post('/parents', [
            'name' => 'Robert',
            'gender' => 'Female',
            'dob' => '1988-09-23',
            'status' => 'active'
        ]);
        
        $parent = Parents::first();

        $response = $this->patch('/parent/' . $parent->id, [
            // 'group_id' => FamilyGroup::first()->id,
            'name' => 'Jessica',
            'gender' => 'Female',
            'dob' => '1988-09-23',
            'status' => 'active'
        ]);

        $this->assertEquals('Jessica', Parents::first()->name);
    }

    // /** @test */
    public function a_club_official_can_archive_a_parent()
    {
        $this->withoutExceptionHandling();

        $famGroup = FamilyGroup::first();

        $this->post('/parents', [
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'active'
        ]);

        $parent = Parents::first();

        $response = $this->patch('/parent/' . $parent->id, [
            'name' => 'Parent',
            'gender' => 'Female',
            'dob' => '28.09.1988',
            'status' => 'archived'
        ]);

        $this->assertEquals('archived', Parents::first()->status);
    }
}