<?php

namespace App\Services;

use App\Interfaces\AuthServiceInterface;
use App\Interfaces\UserServiceInterface;
use App\Repositories\AuthRepository;
use App\Repositories\UserRepository;


/**
 * Class AuthService
 * @package App\Services
 */
class UserService implements UserServiceInterface
{

    public function __construct(private UserRepository $authRepository)
    {}

    /**
     * @inheritDoc
     */
    public function rankOrder(int $orderId, int $userId,int $rate,string $feedback = null)
    {
        $this->authRepository->rankOrder($orderId, $userId, $rate,$feedback);
    }




}
