<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use CorporacionPeru\User;

class UserCanSeeDashBoardTest extends TestCase
{
    /**
     * A basic feature test example.
     * @group feature
     * @return void
     */
    public function testUserCanSeeDashBoard()
    {
        $this->actingAs(User::findOrFail(1));
        $response = $this->get('/home');
        $response->assertSeeText('Panel de Control');
        $response->assertViewHas('array');
        $response->assertStatus(200); //success
    }
}
