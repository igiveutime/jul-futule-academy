<?php

namespace App\Models\Entities\User;

use App\Models\Entities\EntityBuilderAbstract;
use App\Models\Entities\EntityFactory;

class Builder extends EntityBuilderAbstract
{
    public function __construct(\App\Models\Entities\EntityFactory $entityFactory)
    {
        parent::__construct($entityFactory, EntityFactory::USER);
    }

    public function reset(): self
    {
        $this->entity = $this->entityFactory->createEntity(EntityFactory::USER);

        return $this;
    }

    public function setName(?string $name): self
    {
        $this->entity->setName($name);

        return $this;
    }

    public function setLogin(?string $login): self
    {
        $this->entity->setLogin($login);

        return $this;
    }

    public function setPassword(?string $password): self
    {
        $this->entity->setPassword($password);

        return $this;
    }
}
