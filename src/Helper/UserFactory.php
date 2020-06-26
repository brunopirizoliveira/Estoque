<?php

namespace App\Helper;

use App\Entity\User;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFactory
{
    private $userPasswordEncoderInterface;
    
    public function __construct(UserPasswordEncoderInterface $userPasswordEncoderInterface)
    {
        $this->userPasswordEncoderInterface = $userPasswordEncoderInterface;
    }
    
    public function mount(string $json) : User
    {
        $userReceived = \json_decode($json);
        $user = new User;
        $user->setUsername($userReceived->username);
        $user->setEmail($userReceived->email);
        $user->setPassword($this->userPasswordEncoderInterface->encodePassword($user, $userReceived->password));

        return $user;
    }
}