<?php

namespace App\Models\EntityModels;

class CourseModel extends EntityModelAbstract
{
    public function __construct(
        \App\Models\Entities\DirectorFactory $directorFactory,
        \App\Models\DatabaseHandler $dbHandler
    ) {
        parent::__construct($directorFactory, $dbHandler, EntityModelAbstract::COURSE_TABLE);
    }

    public function getAll(): array
    {
        $select = $this->pdo->query('SELECT * FROM ' . $this->tableName);
        return $this->processRows($select);
    }

    public function isUserSubscribed($courseId, $userId): bool
    {
        $select = $this->pdo->prepare('
            SELECT * 
            FROM users_courses 
            WHERE course_id = :course_id AND user_id = :user_id AND value = 1'
        );
        $select->bindParam(':course_id', $courseId);
        $select->bindParam(':user_id', $userId);
        $select->execute();

        return (bool) $this->processRow($select);
    }

    public function subscribeUser($courseId, $userId)
    {
        $insert = $this->pdo->prepare('
            INSERT INTO users_courses (user_id, course_id, value)
            VALUES (:user_id, :course_id, 1)
        ');
        $insert->bindParam(':user_id', $userId);
        $insert->bindParam(':course_id', $courseId);

        $insert->execute();
    }

    public function unsubscribeUser($courseId, $userId)
    {
        $delete = $this->pdo->prepare('
            DELETE FROM users_courses 
            WHERE course_id = :course_id AND user_id = :user_id AND value = 1');
        $delete->bindParam(':course_id', $courseId);
        $delete->bindParam(':user_id', $userId);

        $delete->execute();
    }
}
