<?php

namespace App\Models\EntityModels;

use App\Models\Entities\User\User;

class UserModel extends EntityModelAbstract
{
    public function __construct(
        \App\Models\Entities\DirectorFactory $directorFactory,
        \App\Models\DatabaseHandler $dbHandler,
        \App\Models\EntityModels\ModelFactory $modelFactory
    ) {
        parent::__construct($directorFactory, $dbHandler, EntityModelAbstract::USER_TABLE);
    }


    public function add($inputParams = []): void
    {
        $password = password_hash($inputParams['password'], PASSWORD_DEFAULT);

        $insertUser = $this->pdo->prepare('
            INSERT INTO users (name, login, password)
            VALUES (:name, :login, :password)
        ');
        $insertUser->bindParam(':name', $inputParams['name']);
        $insertUser->bindParam(':login', $inputParams['login']);
        $insertUser->bindParam(':password', $password);

        $insertUser->execute();
    }

    public function getByField(string $fieldName, string $fieldValue): ?User
    {
        $selectUser = $this->pdo->prepare('SELECT * FROM users WHERE ' . $fieldName . ' = :value');
        $selectUser->bindParam(':value', $fieldValue);
        $selectUser->execute();

        return $this->processRow($selectUser);
    }

    public function isLoginValid(string $login, string $id = null): bool
    {
        $user = $this->getByField('login', $login);
        return !$user || $user->getId() == $id;
    }
}
