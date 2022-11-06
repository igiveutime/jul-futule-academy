<?php

namespace App\Models;

class EnvironmentProvider
{
    public const ENV_FILE_NAME              = ROOT_DIR . '/.env';

    protected $dbName   = 'magazine-shop';
    protected $user     = 'Vadim';
    protected $pass     = '8951';

    protected $sessionSavePath  = ROOT_DIR . '/var/sessions';
    protected $cookieLifetime   = 86400;

    public function __construct()
    {
        $parsedEnv = parse_ini_file(self::ENV_FILE_NAME, true);

        if ($this->isConfigFileSet($parsedEnv)) {
            $this->setEnvironment($parsedEnv);
        }
    }


    public function getDatabaseName(): string
    {
        return $this->dbName;
    }

    public function getUser(): string
    {
        return $this->user;
    }

    public function getPassword(): string
    {
        return $this->pass;
    }

    public function getSessionSavePath(): string
    {
        return $this->sessionSavePath;
    }

    public function getCookieLifetime(): int
    {
        return $this->cookieLifetime;
    }

    /**
     * @param array|false $parsedEnv
     * @return bool
     */
    protected function isConfigFileSet($parsedEnv): bool
    {
        foreach ($parsedEnv as $object) {
            if (array_search('', $object)) {
                return false;
            }
        }

        return true;
    }

    /**
     * @param array|false $parsedEnv
     */
    protected function setEnvironment($parsedEnv): void
    {
        $this
            ->setMysqlEnv($parsedEnv)
            ->setSessionEnv($parsedEnv);
    }

    /**
     * @param array|false $parsedEnv
     * @return $this
     */
    protected function setMysqlEnv($parsedEnv): self
    {
        $this->dbName = $parsedEnv['db']['name'];
        $this->user = $parsedEnv['db']['user'];
        $this->pass = $parsedEnv['db']['pass'];

        return $this;
    }


    /**
     * @param array|false $parsedEnv
     * @return $this
     */
    protected function setSessionEnv($parsedEnv): self
    {
        $this->sessionSavePath = $parsedEnv['session']['save_path'];
        $this->cookieLifetime = $parsedEnv['session']['cookie_lifetime'];

        return $this;
    }
}
