<?php


namespace App\Interfaces;

/**
 * Interface AuthServiceInterface
 * @package App\Interfaces
 */
interface AuthServiceInterface
{
    /**
     * Register USer
     * @param string $name
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function register(string $name, string $email, string $password);

    /**
     * Login User
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public function login(string $email,string $password);


}
