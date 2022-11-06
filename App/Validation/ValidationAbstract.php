<?php

namespace App\Validation;

use App\Models\EntityModels\ModelFactory;

abstract class ValidationAbstract
{
    protected $sessionModel;

    public function __construct(\App\Models\EntityModels\ModelFactory $modelFactory)
    {
        $this->sessionModel = $modelFactory->getModel(ModelFactory::SESSION_MODEL);
    }

    abstract public function isDataValid($data = [], string $userId = null): bool;

    abstract protected function isDataFormatCorrect($data = []): bool;

    protected function isThereCSRF(): bool
    {
        return $this->sessionModel->getSessionHash() !== $_POST['csrf-token'];
    }
}
