<?php

namespace App\Controller\Authentication;

use App\Controller\ControllerAbstract;
use App\Models\EntityModels\ModelFactory;

class SaveSignInController extends ControllerAbstract
{
    protected $validation;
    protected $userModel;
    protected $sessionModel;

    public function __construct(
        \App\Validation\RegistrationValidation $validation,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        $this->validation = $validation;
        $this->userModel = $modelFactory->getModel(ModelFactory::USER_MODEL);
        $this->sessionModel = $modelFactory->getModel(ModelFactory::SESSION_MODEL);
    }


    public function execute(): void
    {
        if ($this->validation->isDataValid($_POST)) {
            $this->saveUser();
            $this->sessionModel->logIn($_POST['login']);
            $this->redirect('/');

            return;
        }

        $this->redirectToRegistration();
    }


    protected function saveUser(): void
    {
        $this->userModel->add($_POST);
    }
}
