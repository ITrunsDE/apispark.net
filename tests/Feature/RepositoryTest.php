<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RepositoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test * */
    public function only_authenticated_users_can_see_the_repository()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/repository');

        $response->assertStatus(200);
    }

    /** @test * */
    public function guest_users_cant_see_the_repository()
    {
        $response = $this->get('/repository');

        $response->assertRedirectToRoute('login');
    }

    /** @test **/
    public function authenticated_user_can_create_a_new_repository()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/repository/create');

        $response->assertStatus(200);
    }
}
