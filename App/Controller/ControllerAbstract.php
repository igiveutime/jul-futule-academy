<?php

namespace App\Controller;

abstract class ControllerAbstract
{
    abstract public function execute(): void;

    protected function getHttpHostLocation(): string
    {
        return 'Location: http://' . $_SERVER['HTTP_HOST'];
    }

    protected function redirect(string $urlPath, string $id = null): void
    {
        header($this->getHttpHostLocation() . $urlPath . $this->getIdUrl($id));
    }

    protected function redirectToLogin(): void
    {
        $this->redirect('/login');
    }

    protected function redirectToRegistration(): void
    {
        $this->redirect('/signin');
    }

    protected function getIdParam(): ?string
    {
        return empty(trim($_GET['id'] ?? '')) ?
            null :
            $_GET['id'];
    }

    protected function getIdUrl(string $id = null): string
    {
        return $id ? ('?id=' . $id) : '';
    }
}
