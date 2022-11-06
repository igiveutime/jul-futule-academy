<?php

namespace App\Blocks\Users;

use App\Blocks\EntityBlock;
use App\Models\EntityModels\ModelFactory;
use App\Models\Entities\User\User;

class UserBlock extends EntityBlock
{
    protected $userModel;

    public function __construct(\App\Models\EntityModels\ModelFactory $modelFactory)
    {
        $this->userModel = $modelFactory->getModel(ModelFactory::USER_MODEL);
    }

    public function getById(?string $id): ?User
    {
        if (!$id) {
            return null;
        }

        return $this->userModel->getById($id);
    }
}
