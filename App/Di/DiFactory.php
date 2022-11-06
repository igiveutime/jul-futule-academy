<?php

namespace App\Di;

use Laminas\Di\Di;

class DiFactory
{
    protected $di;

    public function __construct(Di $di)
    {
        $this->di = $di;
    }


    public function createInstance(string $class, array $params = [])
    {
        return $this->di->newInstance($class, $params);
    }

    public function getInstance(string $class, array $params = [])
    {
        return $this->di->get($class, $params);
    }
}
