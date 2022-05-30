<?php

namespace Source\Interpretation;

class Product
{
    public $name;
    private $price;
    private $data;

    public function __set($name, $value): void
    {
        $this->notFound(__FUNCTION__, $name);
        $this->data[$name] = $value;
    }

    public function __get(string $name)
    {
        if (!empty($this->data[$name])) {
            return $this->data[$name];
        } else {
            $this->notFound(__FUNCTION__, $name);
        }
    }

    public function __isset(string $name)
    {
        $this->notFound(__FUNCTION__, $name);
    }

    public function __call(string $name, array $arguments)
    {
        $this->notFound(__FUNCTION__, $name);
        var_dump($arguments);
    }

    public function __toString(): string
    {
        return "<p class='trigger'>Este é um objeto da classe " . __CLASS__ . "</p>";
    }

    public function __unset(string $name): void
    {
        trigger_error(__FUNCTION__.": Acesso negado a propriedade {$name}", E_USER_ERROR);
    }

    public function handler(string $name, string $price)
    {
        $this->name = $name;
        $this->price = number_format($price, "2", ".", ",");
    }

    private function notFound($method, $name)
    {
        echo "<p class='trigger error'>{$method}: A propriedade {$name} não existe em ". __CLASS__ ."!</p>";
    }
}