<?php

namespace App\Controller\Events;

use App\Controller\ControllerAbstract;
use App\Blocks\BlockFactory;

class ListController extends ControllerAbstract
{
    protected $eventsBlock;

    public function __construct(\App\Blocks\BlockFactory $blockFactory)
    {
        $this->eventsBlock = $blockFactory->getBlock(BlockFactory::EVENTS_LIST_BLOCK);
    }

    public function execute(): void
    {
        $this->eventsBlock->render('events');
    }
}
