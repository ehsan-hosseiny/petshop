<?php

namespace Tests\Unit;

use App\Http\Controllers\Order\OrderController;

use App\Models\Order;
use App\Models\User;
use App\Repositories\AuthRepository;
use App\Repositories\OrderRepository;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Faker\Factory as Faker;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function order_list_returns_paginated_data_with_ratings()
    {
        $orderRepository = new OrderRepository();
        $result = $orderRepository->orderList();
        $this->assertTrue($result->first() instanceof Order);
        $this->assertTrue($result->first()->relationLoaded('ratings'));
    }

    /** @test */
    public function login_repository_should_worked_successfully()
    {
        $user = User::factory()->create([
            'password' => bcrypt('password'),
        ]);
        $authRepository = new AuthRepository();
        // Act
        $authRepository->login($user->email,'password');
        $this->assertEquals($user->id, Auth::id());
    }

    /** @test */
    public function register_repository_should_worked_successfully()
    {
        $faker = Faker::create();
        $name = $faker->name;
        $email = $faker->unique()->safeEmail;
        $password = 'secret';
        $authRepository = new AuthRepository();
        $authRepository->register($name,$email,$password);
        $this->assertDatabaseHas('users', [
            'name' => $name,
            'email' => $email,
        ]);
    }
}
