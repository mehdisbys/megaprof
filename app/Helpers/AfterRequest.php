<?php
namespace App\Helpers;


class AfterRequest
{

    private $method;
    private $args;


    /**
     * @param string $method
     * @param array $args
     * @return $this
     */
    public function init(string $method, array $args)
    {
        $this->method  =  $method;
        $this->args    =  $args;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getArgs(): array
    {
        return array_except($this->args, ['request']);
    }

    public function addArgs(array $args)
    {
        array_merge($this->args, $args);

        return $this;
    }

    public function __toString() : string
    {
        return "";
    }
}