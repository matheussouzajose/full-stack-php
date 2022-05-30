<?php

namespace Source\Contracts;

class Login
{
    /**
     * @var
     */
    private $logged;

    /**
     * @param User $user
     * @return User
     */
    public function loginUser(User $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    /**
     * @param UserAdmin $user
     * @return User
     */
    public function loginAdmin(UserAdmin $user): User
    {
        $this->logged = $user;
        return $this->logged;
    }

    public function login(UserInterface $user): UserInterface
    {
        $this->logged = $user;
        return $this->logged;
    }
}