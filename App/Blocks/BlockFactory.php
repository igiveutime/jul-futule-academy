<?php

namespace App\Blocks;

class BlockFactory
{
    public const USERS_OBJECT_BLOCK     = \App\Blocks\Users\UserBlock::class;
    public const SIGN_IN_BLOCK          = \App\Blocks\Users\SignInBlock::class;
    public const LOG_IN_BLOCK           = \App\Blocks\Users\LogInBlock::class;
    public const COURSES_LIST_BLOCK     = \App\Blocks\Courses\ListBlock::class;
    public const COURSES_VIEW_BLOCK     = \App\Blocks\Courses\ViewBlock::class;
    public const COURSES_OBJECT_BLOCK   = \App\Blocks\Courses\CourseBlock::class;
    public const EVENTS_LIST_BLOCK      = \App\Blocks\Events\ListBlock::class;
    public const EVENTS_VIEW_BLOCK      = \App\Blocks\Events\ViewBlock::class;
    public const HOME_BLOCK             = \App\Blocks\Home::class;

    protected $diFactory;

    public function __construct(\App\Di\DiFactory $diFactory)
    {
        $this->diFactory = $diFactory;
    }

    public function getBlock(string $blockName)
    {
        return $this->diFactory->getInstance($blockName);
    }
}
