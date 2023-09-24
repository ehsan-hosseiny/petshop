<?php

namespace App\Services;

use App\Interfaces\OrderServiceInterface;
use App\Repositories\OrderRepository;


/**
 * Class AuthService
 * @package App\Services
 */
class OrderService implements OrderServiceInterface
{

    public function __construct(private OrderRepository $orderRepository)
    {}

    /**
     * @inheritDoc
     */
    public function orderList()
    {
        return $this->orderRepository->orderList();
    }

}
