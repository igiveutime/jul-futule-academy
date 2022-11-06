<?php

namespace App\Blocks;

use App\Models\EntityModels\ModelFactory;

class View
{
    protected $sessionModel;
    protected $userBlock;

    protected $template;
    protected $stylesUrl;
    protected $scriptsUrl;
    protected $user;

    public function __construct(
        \App\Blocks\BlockFactory $blockFactory,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        $this->userBlock = $blockFactory->getBlock(BlockFactory::USERS_OBJECT_BLOCK);
        $this->sessionModel = $modelFactory->getModel(ModelFactory::SESSION_MODEL);
    }


    public function render(string $template): void
    {
        $this->template = $template;
        $this->setUser();

        ob_start();
        require_once ROOT_DIR . '/views/main.phtml';
        ob_end_flush();
    }

    public function renderTemplate(): void
    {
        ob_start();
        require_once ROOT_DIR . "/views/{$this->template}.phtml";
        ob_end_flush();
    }

    public function getStylesUrl(): ?string
    {
        if ($this->template != 'main') {
            return $this->stylesUrl;
        }

        return null;
    }

    public function getScriptsUrl(): ?string
    {
        if ($this->template != 'main') {
            return $this->scriptsUrl;
        }

        return null;
    }


    protected function setUser(): self
    {
        $id = $this->sessionModel->getId();
        $this->user = $this->userBlock->getById($id);

        return $this;
    }
}
