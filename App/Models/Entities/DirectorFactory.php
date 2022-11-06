<?php

namespace App\Models\Entities;

class DirectorFactory
{
    protected $diFactory;

    public function __construct(\App\Di\DiFactory $diFactory)
    {
        $this->diFactory = $diFactory;
    }


    public function getDirector(string $directorName)
    {
        return $this->diFactory->getInstance($directorName);
    }
}
