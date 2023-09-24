<?php


namespace App\Interfaces;

/**
 * Interface AuthServiceInterface
 * @package App\Interfaces
 */
interface UserServiceInterface
{
    /**
     * @param int $orderId
     * @param int $userId
     * @param int $rate
     * @param string|null $feedback
     * @return mixed
     */
    public function rankOrder(int $orderId, int $userId,int $rate,string $feedback = null);

}
