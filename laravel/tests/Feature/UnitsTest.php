<?php

namespace Tests\Feature;

use Tests\TestCase;
use Tests\ValidatesFields;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UnitsTest extends TestCase
{
    use RefreshDatabase;
    use ValidatesFields;

    /** @test */
    public function a_guest_user_cant_view_the_units()
    {
        $this->get('/units')->assertRedirect('login');
    }

    /** @test */
    public function a_guest_user_cant_view_a_unit()
    {
        $data = factory('App\Unit')->create();

        $this->get('/units/'. $data->id)->assertRedirect('login');
    }

    /** @test */
    public function a_guest_user_cant_view_the_edit_page()
    {
        $data = factory('App\Unit')->create();

        $this->get('/units/'. $data->id . '/edit')->assertRedirect('login');
    }

    /** @test */
    public function a_guest_user_cant_view_the_create_page()
    {
        $this->get('/units/create')->assertRedirect('login');
    }

    /** @test */
    public function a_guest_user_cant_add_a_unit()
    {
        $data = factory('App\Unit')->raw();

        $this->post('/units', $data)->assertRedirect('login');
    }

    /** @test */
    public function a_guest_user_cant_edit_a_unit()
    {
        $data = factory('App\Unit')->create();

        $new_name = 'New name';
        $old_name = $data->name;
        $data->name = $new_name;

        $this->put('/units/' . $data->id, $data->toArray())->assertRedirect('login');
        $this->assertDatabaseHas('units', ['id' => $data->id, 'name' => $old_name]);
    }

    /** @test */
    public function a_guest_user_cant_delete_a_unit()
    {

        $data = factory('App\Unit')->create();

        $this->delete('/units/' . $data->id, $data->toArray())
            ->assertRedirect('login');

        $this->assertDatabaseHas('units', ['id' => $data->id]);
    }

    /** @test */
    public function a_logged_in_user_can_view_the_units()
    {

        $this->actingAs(factory('App\User')->create());

        $this->get('/units')
            ->assertViewIs('units.index');
    }

    /** @test */
    public function a_logged_in_user_can_view_a_unit()
    {
        $this->actingAs(factory('App\User')->create());

        $data = factory('App\Unit')->create();

        $this->get('/units/'. $data->code)
            ->assertSee(e($data->name));

        $this->get('/units/'. $data->code . '/edit')
            ->assertSee(e($data->name));
    }

    /** @test */
    public function a_logged_in_user_can_see_the_create_page()
    {

        $this->actingAs(factory('App\User')->create());

        $this->get('/units/create')
            ->assertViewIs('units.create');
    }

    /** @test */
    public function a_logged_in_user_can_add_a_unit()
    {

        $this->actingAs(factory('App\User')->create());

        $data = factory('App\Unit')->raw();

        $this->post('/units', $data)
            ->assertRedirect('/units');

        $this->assertDatabaseHas('units', $data);

        $this->get('/units')->assertSee(e($data['name']));
    }

   /** @test */
    public function a_logged_in_user_can_see_the_edit_page()
    {

        $this->actingAs(factory('App\User')->create());

        $data = factory('App\Unit')->create();

        $this->get('/units/' . $data->code . '/edit')
            ->assertViewIs('units.edit')
            ->assertSee(e($data['name']));

    }

   /** @test */
    public function a_logged_in_user_can_edit_a_unit()
    {

        //$this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $data = factory('App\Unit')->create();

        $new_name = 'New name';
        $data->name = $new_name;

        $this->put('/units/' . $data->code, $data->toArray());

        $this->assertDatabaseHas('units', ['id' => $data->id, 'name' => $new_name]);
    }

    /** @test */
    public function a_logged_in_user_can_delete_a_unit()
    {

        $this->withoutExceptionHandling();

        $this->actingAs(factory('App\User')->create());

        $data = factory('App\Unit')->create();

        $this->delete('/units/' . $data->code, $data->toArray());

        $this->assertDatabaseMissing('units', ['id' => $data->id]);
    }


    /* Validations */

    /** @test */
    public function a_unit_requires_a_name()
    {
        $this->validate('App\Unit', '/units', 'name');
    }

    /** @test */
    public function a_unit_requires_a_code()
    {
        $this->validate('App\Unit', '/units', 'code');
    }

    /** @test */
    public function a_unit_requires_a_type()
    {
        $this->validate('App\Unit', '/units', 'type_id');
    }


}
