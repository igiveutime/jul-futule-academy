<?php

namespace App\Blocks\Courses;

use App\Blocks\EntityBlock;
use App\Models\Entities\Course\Course;
use App\Models\EntityModels\ModelFactory;

class CourseBlock extends EntityBlock
{
    protected $coursesModel;

    public function __construct(\App\Models\EntityModels\ModelFactory $modelFactory)
    {
        $this->coursesModel = $modelFactory->getModel(ModelFactory::COURSE_MODEL);
    }

    public function getById(?int $id): ?Course
    {
        return $this->coursesModel->getById($id);
    }

    public function isUserSubscribed(?int $userId): bool
    {
        $courseId = $this->getId();
        return $this->coursesModel->isUserSubscribed($courseId, $userId);
    }

    public function subscribeUser(?int $userId)
    {
        $courseId = $this->getId();
        $this->coursesModel->subscribeUser($courseId, $userId);
    }

    public function unsubscribeUser(?int $userId)
    {
        $courseId = $this->getId();
        $this->coursesModel->unsubscribeUser($courseId, $userId);
    }
}
