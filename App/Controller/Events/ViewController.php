<?php

namespace App\Controller\Events;

use App\Controller\ControllerAbstract;
use App\Blocks\BlockFactory;

class ViewController extends ControllerAbstract
{
    protected $eventsBlock;

    public function __construct(\App\Blocks\BlockFactory $blockFactory)
    {
        $this->eventsBlock = $blockFactory->getBlock(BlockFactory::EVENTS_VIEW_BLOCK);
    }

    public function execute(): void
    {
        $this->eventsBlock->render('event');
    }
}
