<?php

namespace App\Blocks\Courses;

use App\Blocks\View;
use App\Models\EntityModels\ModelFactory;

class ListBlock extends View
{
    protected $coursesModel;

    public function __construct(
        \App\Blocks\BlockFactory $blockFactory,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        parent::__construct($blockFactory, $modelFactory);

        $this->stylesUrl = '/assets/css/all_courses.css';
        $this->coursesModel = $modelFactory->getModel(ModelFactory::COURSE_MODEL);
    }

    public function getAll(): array
    {
        return $this->coursesModel->getAll();
    }
}
