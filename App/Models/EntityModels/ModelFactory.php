<?php

namespace App\Models\EntityModels;

class ModelFactory
{
    public const USER_MODEL   = \App\Models\EntityModels\UserModel::class;
    public const COURSE_MODEL = \App\Models\EntityModels\CourseModel::class;

    public const SESSION_MODEL  = \App\Models\SessionModel::class;

    protected $diFactory;

    public function __construct(\App\Di\DiFactory $diFactory)
    {
        $this->diFactory = $diFactory;
    }


    public function getModel(string $modelName)
    {
        return $this->diFactory->getInstance($modelName);
    }
}
