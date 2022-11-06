<?php

namespace App\Models\Entities;

abstract class EntityBuilderAbstract
{
    protected $entity;
    protected $entityFactory;

    public function __construct(\App\Models\Entities\EntityFactory $entityFactory, $entityClass)
    {
        $this->entityFactory = $entityFactory;
        $this->entity = $this->entityFactory->createEntity($entityClass);
    }

    abstract public function reset();

    public function setId(?int $id): self
    {
        $this->entity->setId($id);

        return $this;
    }

    public function getEntity(): EntityAbstract
    {
        return $this->entity;
    }
}
