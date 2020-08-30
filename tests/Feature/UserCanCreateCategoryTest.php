<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;
class UserCanCreateCategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    function UserCanCreateCategory()
    {
        $response = $this->get('/');

        $response->assertStatus(301);
    }


    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function LoadsCategoryList()
    {
        $user = User::find(1); // find specific user
        $this->actingAs($user);
        $response = $this->get('/categorias');
        $response->assertSeeText('Categorías de productos con los que trabaja la empresa');
        $response->assertViewHas('categorias');
    }
}
