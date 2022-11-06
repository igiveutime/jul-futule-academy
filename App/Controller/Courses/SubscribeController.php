<?php

namespace App\Controller\Courses;

use App\Controller\ControllerAbstract;
use App\Blocks\BlockFactory;

class SubscribeController extends ControllerAbstract
{
    protected $coursesBlock;

    public function __construct(\App\Blocks\BlockFactory $blockFactory)
    {
        $this->coursesBlock = $blockFactory->getBlock(BlockFactory::COURSES_VIEW_BLOCK);
    }

    public function execute(): void
    {
        $this->coursesBlock->setId($this->getIdParam());
        $this->coursesBlock->subscribeUser();
        $this->coursesBlock->render('courses/view');
    }
}
