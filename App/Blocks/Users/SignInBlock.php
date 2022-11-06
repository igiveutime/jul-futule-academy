<?php

namespace App\Blocks\Users;

use App\Blocks\View;

class SignInBlock extends View
{
    public function __construct(
        \App\Blocks\BlockFactory $blockFactory,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        parent::__construct($blockFactory, $modelFactory);

        $this->stylesUrl = '/assets/css/signin.css';
    }
}
