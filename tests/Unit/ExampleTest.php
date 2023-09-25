<?php

namespace Tests\Unit;

use App\Http\Controllers\Order\OrderController;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Tests\TestCase;

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
        // Arrange
        $orderRepository = new OrderRepository();

        // Act
        $result = $orderRepository->orderList();
dd($result->first());
//        $this->assertInstanceOf(\Illuminate\Pagination\LengthAwarePaginator::class, $result);
        $this->assertTrue($result->first() instanceof Order);
        $this->assertTrue($result->first()->relationLoaded('ratings'));

        // Assert the expected behavior
//        $this->assertInstanceOf(LengthAwarePaginator::class, $result->getData()->data);
//        $this->assertCount(10, $result->items());
    }
}
