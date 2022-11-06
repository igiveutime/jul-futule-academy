<?php

namespace App\Models\Entities;

class EntityFactory
{
    public const USER   = \App\Models\Entities\User\User::class;
    public const COURSE = \App\Models\Entities\Course\Course::class;

    protected $diFactory;

    public function __construct(\App\Di\DiFactory $diFactory)
    {
        $this->diFactory = $diFactory;
    }


    public function createEntity(string $entityName)
    {
        return $this->diFactory->createInstance($entityName);
    }
}
