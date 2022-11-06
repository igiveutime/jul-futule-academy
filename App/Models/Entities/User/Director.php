<?php

namespace App\Models\Entities\User;

class Director
{
    protected $builder;

    public function __construct(Builder $builder)
    {
        $this->builder = $builder;
    }

    public function build($data = []): User
    {
        return $this->builder
            ->reset()
            ->setId($data['id'])
            ->setName($data['name'])
            ->setLogin($data['login'])
            ->setPassword($data['password'])
            ->getEntity();
    }
}
