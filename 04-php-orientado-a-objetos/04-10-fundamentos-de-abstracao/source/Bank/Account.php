<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

abstract class Account
{
    protected $branch;
    protected $account;
    protected $client;
    protected $balance;

    /**
     * @param $branch
     * @param $account
     * @param User $client
     * @param $balance
     */
    protected function __construct($branch, $account, User $client, $balance)
    {
        $this->branch = $branch;
        $this->account = $account;
        $this->client = $client;
        $this->balance = $balance;
    }

    public function extract()
    {
        $extract = ($this->balance >= 1 ? Trigger::ACCEPT : Trigger::ERROR);
        Trigger::show("Extrato: Saldo Atual: {$this->toBrl($this->balance)}", $extract);
    }

    protected function toBrl($value)
    {
        return "R$ " .number_format($value, "2", ",", ".");
    }

    abstract public function deposit($value);

    abstract public function withdrawal($value);

}