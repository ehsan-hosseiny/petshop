<?php

namespace App\Services;

use App\Interfaces\AuthServiceInterface;
use App\Repositories\AuthRepository;


/**
 * Class AuthService
 * @package App\Services
 */
class AuthService implements AuthServiceInterface
{

    public function __construct(private AuthRepository $authRepository)
    {}

    /**
     * @inheritDoc
     */
    public function register(string $name, string $email, string $password)
    {
        $this->authRepository->register($name, $email, $password);
    }

    /**
     * @inheritDoc
     */
    public function login(string $email,string $password)
    {
        return $this->authRepository->login($email,$password);
    }




}
