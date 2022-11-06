<?php

namespace App\Blocks\Users;

use App\Blocks\View;

class LogInBlock extends View
{
    public function __construct(
        \App\Blocks\BlockFactory $blockFactory,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        parent::__construct($blockFactory, $modelFactory);

        $this->stylesUrl = '/assets/css/login.css';
    }
}
