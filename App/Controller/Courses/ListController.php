<?php

namespace App\Controller\Courses;

use App\Controller\ControllerAbstract;
use App\Blocks\BlockFactory;

class ListController extends ControllerAbstract
{
    protected $coursesBlock;

    public function __construct(\App\Blocks\BlockFactory $blockFactory)
    {
        $this->coursesBlock = $blockFactory->getBlock(BlockFactory::COURSES_LIST_BLOCK);
    }

    public function execute(): void
    {
        $this->coursesBlock->render('all_courses');
    }
}
