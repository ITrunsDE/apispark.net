<?php

namespace Tests\Feature;

use App\Models\Repository;
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

    /** @test * */
    public function authenticated_user_can_create_a_new_repository()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->get('/repository/create');

        $response->assertStatus(200);
    }

    /** @test * */
    public function only_registered_users_can_create_repositories()
    {
//        $this->withoutExceptionHandling();

        $response = $this->post('/repository', [
            'user_id' => 1,
            'name' => 'Test Repository',
            'ingest_token' => '00000000-0000-0000-0000-000000000000',
            'active' => 1,
            'base_url' => 'https://cloud.community.humio.com',
        ]);

        $response->assertRedirectToRoute('login');

        $this->assertCount(0, Repository::all());
    }

    /** @test * */
    public function an_user_can_create_a_repository()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/repository', [
                'user_id' => 1,
                'name' => 'Test Repository',
                'ingest_token' => '00000000-0000-0000-0000-000000000000',
                'base_url' => 'https://cloud.community.humio.com',
            ]);

        $response->assertRedirect();

        $this->assertCount(1, Repository::all());

    }

    /** @test * */
    public function an_user_can_edit_a_repository()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();

        $repository = Repository::factory()->create();

        $response = $this->actingAs($user)
            ->patch('/repository/' . $repository->id, [
                'name' => 'Test Repository',
                'ingest_token' => $repository->ingest_token,
                'base_url' => $repository->base_url
            ]);

        $response->assertRedirect();

        $this->assertDatabaseHas('repositories', [
            'id' => $repository->id,
            'name' => 'Test Repository'
        ]);
    }

    /** @test * */
    public function a_user_can_delete_a_repository()
    {
        $user = User::factory()->create();

        $repository = Repository::factory()->create();
        $this->assertCount(1, Repository::all());

        $response = $this->actingAs($user)
            ->delete('/repository/' . $repository->id);

        $response->assertRedirect();

        $this->assertCount(0, Repository::all());

    }

    /** @test * */
    public function an_ingest_token_must_be_unique_in_the_database_if_created()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/repository', [
                'user_id' => 1,
                'name' => 'Test Repository',
                'ingest_token' => '00000000-0000-0000-0000-000000000000',
                'base_url' => 'https://cloud.community.humio.com',
            ]);

        $response->assertRedirect();

        $this->assertCount(1, Repository::all());

        $response = $this->actingAs($user)
            ->post('/repository', [
                'user_id' => 1,
                'name' => 'Test Repository2',
                'ingest_token' => '00000000-0000-0000-0000-000000000000',
                'base_url' => 'https://cloud.community.humio.com',
            ]);

        $response->assertRedirect();

        $this->assertCount(1, Repository::all());
    }



    /** @test * */
    public function a_repository_can_be_verified()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/repository', [
                'user_id' => 1,
                'name' => 'Test Repository',
                'ingest_token' => '00000000-0000-0000-0000-000000000000',
                'base_url' => 'https://cloud.community.humio.com',
            ]);

        $response->assertRedirect();

        $this->assertCount(1, Repository::all());

        $repository = Repository::first();
        $this->assertNull($repository->verified_at);

        $response = $this->actingAs($user)
            ->post('/repository/' . $repository->id . '/verify-verification-token', [
                'verification_token' => $repository->verification_token,
            ]);

        $response->assertRedirect();

        $repository->refresh();
        $this->assertNotNull($repository->verified_at);
    }

    /** @test * */
    public function a_repository_can_only_be_verified_with_the_correct_verification_token()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
            ->post('/repository', [
                'user_id' => 1,
                'name' => 'Test Repository',
                'ingest_token' => '00000000-0000-0000-0000-000000000000',
                'base_url' => 'https://cloud.community.humio.com',
            ]);

        $response->assertRedirect();

        $this->assertCount(1, Repository::all());

        $repository = Repository::first();
        $this->assertNull($repository->verified_at);

        $response = $this->actingAs($user)
            ->post('/repository/' . $repository->id . '/verify-verification-token', [
                'verification_token' => '00000000-0000-0000-0000-000000000000',
            ]);

        $response->assertRedirect();

        $repository->refresh();
        $this->assertNull($repository->verified_at);
    }

//    /** @test * */
    public function an_ingest_token_must_be_unique_in_the_database_if_edited()
    {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();
        $this->assertCount(1, User
            ::all());


        Repository::create([
            'user_id' => 1,
            'name' => 'Test Repository',
            'ingest_token' => '00000000-0000-0000-0000-000000000000',
            'base_url' => 'https://cloud.community.humio.com',
            'verification_token' => uuid_create(),
        ]);

        Repository::create([
            'user_id' => 1,
            'name' => 'Test Repository2',
            'ingest_token' => '11111111-1111-1111-1111-111111111111',
            'base_url' => 'https://cloud.community.humio.com',
            'verification_token' => uuid_create()
            ,
        ]);

        $response = $this->actingAs($user)
            ->patch('/repository/2/', [
                'name' => 'Test Repository',
                'ingest_token' => '00000000-0000-0000-0000-000000000000',
                'base_url' => 'https://cloud.community.humio.com',
            ]);

        $response->assertRedirect();

        $repo_check1 = Repository::find(1
        );
        $repo_check2 = Repository::find(2);

        $this->assertNotEquals($repo_check1->ingest_token, $repo_check2->ingest_token);
    }


}
