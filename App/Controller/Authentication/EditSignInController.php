<?php

namespace App\Controller\Authentication;

use App\Controller\ControllerAbstract;
use App\Blocks\BlockFactory;

class EditSignInController extends ControllerAbstract
{
    protected $signInBlock;

    public function __construct(\App\Blocks\BlockFactory $blockFactory)
    {
        $this->signInBlock = $blockFactory->getBlock(BlockFactory::SIGN_IN_BLOCK);
    }


    public function execute(): void
    {
        $this->signInBlock->render('signin');
    }
}
