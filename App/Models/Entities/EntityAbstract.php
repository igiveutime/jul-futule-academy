<?php

namespace App\Models\Entities;

abstract class EntityAbstract
{
    protected $id;

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }
}
