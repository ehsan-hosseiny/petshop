<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function orderList()
    {
        return Order::with('ratings')->paginate(10);
    }

}
