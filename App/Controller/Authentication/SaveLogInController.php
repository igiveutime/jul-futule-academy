<?php

namespace App\Controller\Authentication;

use App\Controller\ControllerAbstract;
use App\Models\EntityModels\ModelFactory;

class SaveLogInController extends ControllerAbstract
{
    protected $validation;
    protected $sessionModel;

    public function __construct(
        \App\Validation\AuthenticationValidation $validation,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        $this->validation = $validation;
        $this->sessionModel = $modelFactory->getModel(ModelFactory::SESSION_MODEL);
    }


    public function execute(): void
    {
        if ($this->validation->isDataValid($_POST)) {
            $this->sessionModel->logIn($_POST['login']);
            $this->redirect('/');

            return;
        }

        $this->redirectToLogin();
    }
}
