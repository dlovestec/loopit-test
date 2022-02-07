<?php

namespace Tests\Feature\Car;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Symfony\Component\HttpFoundation\Response;
use Tests\TestCase;

class CarTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_page_is_displaying_car_list_when_user_authenticated()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->create();
        $this->actingAs($user);
        $this->json('GET','api/v1/cars',['Accept' => 'application/json'])->assertStatus(Response::HTTP_OK);
    }
}
