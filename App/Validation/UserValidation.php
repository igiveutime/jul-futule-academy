<?php

namespace App\Validation;

use App\Blocks\HtmlEncoder;
use App\Models\EntityModels\ModelFactory;

class UserValidation extends ValidationAbstract
{
    protected $userModel;

    public function __construct(\App\Models\EntityModels\ModelFactory $modelFactory)
    {
        parent::__construct($modelFactory);

        $this->userModel = $modelFactory->getModel(ModelFactory::USER_MODEL);
    }


    public function isDataValid($data = [], string $userId = null): bool
    {
        return !$this->isThereCSRF() &&
            $this->isDataFormatCorrect($data);
    }


    protected function isDataFormatCorrect($data = []): bool
    {
        foreach ($data as $field => $value) {
            $isValueEmpty = !trim($value);
            $encodedValue = HtmlEncoder::encodeRow($value);

            if ($isValueEmpty || $encodedValue !== $value) {
                $this->sessionModel->setMessage("Please set {$field} correctly");

                return false;
            }
        }

        return true;
    }
}
