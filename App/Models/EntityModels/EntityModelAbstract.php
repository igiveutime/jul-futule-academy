<?php

namespace App\Models\EntityModels;

use App\Models\Entities\EntityAbstract;
use App\Models\Entities\User\User;

abstract class EntityModelAbstract
{
    public const USER_TABLE   = 'users';
    public const COURSE_TABLE = 'courses';

    protected $tableName;
    protected $pdo;
    protected $director;

    protected $modelDirectors = [
        self::USER_TABLE   => \App\Models\Entities\User\Director::class,
        self::COURSE_TABLE => \App\Models\Entities\Course\Director::class
    ];

    public function __construct(
        \App\Models\Entities\DirectorFactory $directorFactory,
        \App\Models\DatabaseHandler $dbHandler,
        string $tableName
    ) {
        $this->pdo = $dbHandler->getPDO();
        $this->tableName = $tableName;
        $this->director = $directorFactory->getDirector($this->modelDirectors[$tableName]);
    }

    public function getById(?string $id)
    {
        $selectEntity = $this->pdo->prepare('SELECT * FROM ' . $this->tableName . ' WHERE id = :id');
        $selectEntity->bindParam(':id', $id, \PDO::PARAM_INT);
        $selectEntity->execute();

        return $this->processRow($selectEntity);
    }

    protected function processRows(\PDOStatement $selection): array
    {
        $entities = [];
        while ($row = $selection->fetch(\PDO::FETCH_LAZY)) {
            $entities[] = $this->director->build($row);
        }

        return $entities;
    }

    /**
     * @param \PDOStatement $selection
     * @return EntityAbstract|User|null
     */
    protected function processRow(\PDOStatement $selection)
    {
        $row = $selection->fetch(\PDO::FETCH_LAZY);
        if (!$row) {
            return null;
        }

        return $this->director->build($row);
    }
}
