<?php

namespace Source\Qualifield;

class User
{
    private string $firstName;
    private string $lastName;
    private string $email;

    private string $error;

    /**
     * @param $firstName
     * @param $lastName
     * @param $email
     * @return bool
     */
    public function setUser($firstName, $lastName, $email): bool
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);

        if (!$this->setEmail($email)) {
            $this->error = "O e-mail {$this->getEmail()} não é válido!";
            return false;
        }
        return true;
    }

    /**
     * @return string
     */
    public function getError(): string
    {
        return $this->error;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     * @return void
     */
    private function setFirstName(string $firstName): void
    {
        $this->firstName = filter_var($firstName, FILTER_SANITIZE_STRIPPED);
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     * @return void
     */
    private function setLastName(string $lastName): void
    {
        $this->lastName = filter_var($lastName, FILTER_SANITIZE_STRIPPED);
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return bool
     */
    private function setEmail(string $email): bool
    {
        $this->email = $email;
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}