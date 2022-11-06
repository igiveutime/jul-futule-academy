<?php

namespace App\Blocks\Courses;

use App\Blocks\BlockFactory;
use App\Blocks\View;
use App\Models\Entities\Course\Course;
use App\Models\EntityModels\ModelFactory;

class ViewBlock extends View
{
    protected $courseBlock;
    protected $userModel;

    public function __construct(
        \App\Blocks\BlockFactory $blockFactory,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        parent::__construct($blockFactory, $modelFactory);

        $this->stylesUrl = '/assets/css/courses/view.css';
        $this->courseBlock = $blockFactory->getBlock(BlockFactory::COURSES_OBJECT_BLOCK);
        $this->userModel = $modelFactory->getModel(ModelFactory::USER_MODEL);
    }

    public function setId(int $id): self
    {
        $this->courseBlock->setId($id);

        return $this;
    }

    public function getId(): ?int
    {
        return $this->courseBlock->getId();
    }

    public function getById(?int $id): ?Course
    {
        return $this->courseBlock->getById($id);
    }

    public function isUserSubscribed(): bool
    {
        $this->setUser();
        $userId = $this->user->getId();
        return $this->courseBlock->isUserSubscribed($userId);
    }

    public function subscribeUser()
    {
        $this->setUser();
        $userId = $this->user->getId();
        $this->courseBlock->subscribeUser($userId);
    }

    public function unsubscribeUser()
    {
        $this->setUser();
        $userId = $this->user->getId();
        $this->courseBlock->unsubscribeUser($userId);
    }
}
