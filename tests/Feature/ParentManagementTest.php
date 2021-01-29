<?php

namespace Tests\Feature;

use App\Models\FamilyGroup;
use App\Models\Parents;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class ParentManagementTest extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    /** @test */
    public function a_parent_can_be_created() {

        // $this->withoutExceptionHandling();

        $this->post('/parents/store', $this->data());
        $this->assertCount(1, User::all());

        $this->assertInstanceOf(Carbon::class, User::first()->dob);
    }

    // /** @test */
    public function parent_information_is_required()
    {
        $parent = $this->post('/parents', array_merge($this->data(), ['name' => '']));
        $parent->assertSessionHasErrors(['name']);
    }

    // /** @test */
    public function a_parent_can_be_updated()
    {
        // $this->withoutExceptionHandling();
   
        $this->post('/parents', $this->data());
        $this->assertCount(1, User::all());

        $parent = User::first();
        $response = $this->patch('/parents/' . $parent->id, array_merge($this->data(), ['name' => 'Jessica']));

        $response->assertOK();

        $this->assertInstanceOf(Carbon::class, $parent->first()->dob);
        $this->assertEquals('Jessica', User::first()->name);
    }

    // /** @test */
    public function a_parent_can_be_archived()
    {
        $this->withoutExceptionHandling();

        $this->post('/parents', $this->data());

        $parent = User::first();

        $response = $this->patch('/parent/' . $parent->id, array_merge($this->data(), ['status_id' => 3]));

        $this->assertEquals('archived', User::first()->status);
    }

    public function data()
    {
        return [
            'group_id' => null,
            'name' => 'Robert',
            'slug' => 'robert',
            'gender' => 'Female',
            'dob' => '09/28/1998',
            'passwords' => 'robert',
            'status_id' => 3
        ];
    }
}