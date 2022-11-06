<?php

namespace App\Controller;

use App\Blocks\BlockFactory;

class HomeController extends ControllerAbstract
{
    protected $homeBlock;

    public function __construct(\App\Blocks\BlockFactory $blockFactory)
    {
        $this->homeBlock = $blockFactory->getBlock(BlockFactory::HOME_BLOCK);
    }


    public function execute(): void
    {
        $this->homeBlock->render('index');
    }
}
