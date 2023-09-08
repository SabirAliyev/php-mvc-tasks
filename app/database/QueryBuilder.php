<?php

namespace App\App\Database;
use App\Models\Task;
use \PDO;
use PDOException;

// A class responsible for building database queries.
class QueryBuilder
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function selectAll(string $table, string $fetchClass=null): bool|array
    {
        $query = $this->db->prepare("select * from {$table};");
        $query->execute();
        
        if ($fetchClass) {
            return $query->fetchAll(PDO::FETCH_CLASS, $fetchClass);
        }

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function insert(string $table, array $parameters): void
    {
        $sql = sprintf(
                "INSERT INTO %s (%s) VALUES (%s)",
                $table,
                implode(', ', array_keys($parameters)),
                ':' . implode(', :', array_keys($parameters))
        );  
        $query = $this->db->prepare($sql);
        $query->execute($parameters);
    }

    public function update(string $table, int $id, array $parameters): void
    {
        $setFields = [];
        foreach ($parameters as $key => $value) {
            $setFields[] = "$key = :$key";
        }
        $setString = implode(', ', $setFields);

        $sql = sprintf(
            "UPDATE %s SET %s WHERE id = :id",
            $table,
            $setString
        );

        $query = $this->db->prepare($sql);
        $parameters['id'] = $id; // Add the id to the parameters array
        $query->execute($parameters);
    }


    public function selectOne(string $table, int $id,  string $fetchClass=null): Task
    {
        try {
            $query = $this->db->prepare("select * from $table where id = :id");
            $query->bindParam(':id', $id, PDO::PARAM_INT);
            $query->execute();

            if ($fetchClass) {
                $query->setFetchMode(PDO::FETCH_CLASS, $fetchClass);
                return $query->fetch();
            }
        } catch (PDOException $e) {
            dd($e->getMessage());
        }

        return $query->fetch(PDO::FETCH_ASSOC);
    }
}







