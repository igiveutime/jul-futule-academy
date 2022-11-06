<?php

namespace App\Controller\Authentication;

use App\Controller\ControllerAbstract;
use App\Blocks\BlockFactory;
use App\Models\EntityModels\ModelFactory;

class EditLogInController extends ControllerAbstract
{
    protected $sessionModel;
    protected $logInBlock;

    public function __construct(
        \App\Blocks\BlockFactory $blockFactory,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        $this->sessionModel = $modelFactory->getModel(ModelFactory::SESSION_MODEL);
        $this->logInBlock = $blockFactory->getBlock(BlockFactory::LOG_IN_BLOCK);
    }


    public function execute(): void
    {
        if ($this->isUserLoggedId()) {
            $this->logoutUser();
            return;
        }

        $this->logInBlock->render('login');
    }


    protected function logoutUser(): void
    {
        $this->sessionModel->destroy();
        $this->redirect('/');
    }

    protected function isUserLoggedId(): bool
    {
        return $this->sessionModel->isLoggedIn();
    }
}
