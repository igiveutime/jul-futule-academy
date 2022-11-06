<?php

namespace App\Validation;

use App\Blocks\HtmlEncoder;
use App\Models\EntityModels\ModelFactory;

class RegistrationValidation extends ValidationAbstract
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
            $this->isDataFormatCorrect($data) &&
            $this->isLoginValid($data['login']);
    }


    protected function isDataFormatCorrect($data = []): bool
    {
        foreach ($data as $field => $value) {
            $isValueEmpty = !trim($value);
            $encodedValue = HtmlEncoder::encodeRow($value);

            if ($isValueEmpty || $encodedValue !== $value) {
                $this->sessionModel->setMessage('Необходимо заполнить все поля');

                return false;
            }
        }

        return true;
    }

    private function isLoginValid(string $login): bool
    {
        $encodedLogin = HtmlEncoder::encodeRow($login);

        if (!$this->userModel->isLoginValid($encodedLogin)) {
            $this->sessionModel->setMessage('Этот логин уже используется');

            return false;
        }

        return true;
    }
}
