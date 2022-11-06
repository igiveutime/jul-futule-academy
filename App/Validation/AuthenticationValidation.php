<?php

namespace App\Validation;

use App\Blocks\HtmlEncoder;

class AuthenticationValidation extends ValidationAbstract
{
    public function isDataValid($data = [], string $userId = null): bool
    {
       return !$this->isThereCSRF() &&
            $this->isDataFormatCorrect($data) &&
            $this->isAuthenticationSuccessful($data);
    }


    protected function isDataFormatCorrect($data = []): bool
    {
        foreach ($data as $field => $value) {
            $encodedValue = HtmlEncoder::encodeRow($value);

            if (!trim($value) || $encodedValue !== $value) {
                $this->sessionModel->setMessage('Необходимо заполнить все поля');
                return false;
            }
        }

        return true;
    }


    private function isAuthenticationSuccessful($data = []): bool
    {
        if (!$this->sessionModel->isAuthenticationSuccessful($data)) {
            $this->sessionModel->setMessage('Неправильный логин или пароль');

            return false;
        }

        return true;
    }
}
