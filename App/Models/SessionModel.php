<?php

namespace App\Models;

use App\Models\EntityModels\ModelFactory;

class SessionModel
{
    protected $userModel;
    protected $envProvider;

    public function __construct(
        EnvironmentProvider $envProvider,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        $this->envProvider = $envProvider;
        $this->userModel = $modelFactory->getModel(ModelFactory::USER_MODEL);
    }


    public function start(): void
    {
        if (session_status() === PHP_SESSION_ACTIVE) {
            return;
        }

        self::checkSessionDir();
        self::setOptions();

        session_start();
    }

    public function getSessionHash(): string
    {
        return md5(session_id());
    }

    public function destroy(): void
    {
        session_destroy();
    }

    public function getId(): ?string
    {
        return trim($_SESSION['id'] ?? '');
    }

    public function setMessage(string $message): void
    {
        $_SESSION['messages'][] = $message;
    }

    public function getMessages(bool $remove = true): array
    {
        $messages = $_SESSION['messages'] ?? [];

        if ($remove) {
            unset($_SESSION['messages']);
        }

        return $messages;
    }

    public function logIn(string $login): void
    {
        $_SESSION['id'] = $this->userModel->getByField('login', $login)->getId();
    }

    public function isLoggedIn(): bool
    {
        return trim(self::getId() ?? '');
    }

    public function isAuthenticationSuccessful($data = []): bool
    {
        $user = $this->userModel->getByField('login', $data['login']);
        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user->getPassword());
    }


    protected function setOptions(): void
    {
        ini_set('session.save_path', ROOT_DIR . $this->envProvider->getSessionSavePath());
        ini_set('session.cookie_lifetime', $this->envProvider->getCookieLifetime());
    }

    protected function checkSessionDir(): void
    {
        $sessionDir = ROOT_DIR . $this->envProvider->getSessionSavePath();

        if (!is_dir($sessionDir)) {
            mkdir($sessionDir, 0777, true);
        }
    }
}
