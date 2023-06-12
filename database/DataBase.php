<?php

namespace Database;

use Exception;
use PDO;

class DataBase
{

    private $connection;
    private $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"];

    private $dbHost = DB_HOST;
    private $dbName = DB_NAME;
    private $dbUsername = DB_USERNAME;
    private $dbPassword = DB_PASSWORD;

    public function __construct()
    {

        try {
            $this->connection = new PDO('mysql:host=' . $this->dbHost . ";dbname=" . $this->dbName, $this->dbUsername, $this->dbPassword, $this->options);

        } catch (Exception $e) {
            echo 'error ' . $e->getMessage();
            return false;
        }

    }

    // select('select * from user');
    // select('select * from user WHERE id = ?', [2]);
    public function select($sql, $values = null)
    {
        try {

            $statement = $this->connection->prepare($sql);
            if ($values == null) {
                $statement->execute();
            } else {
                $statement->execute($values);
            }
            $result = $statement;
            return $result;

        } catch (Exception $e) {
            echo 'error ' . $e->getMessage();
            return false;
        }

    }

    // insert('users', ['email', 'age'], ['ali@yahoo.com', 20]);
    public function insert($tableName, $fields, $values)
    {
        try {
            $statement = $this->connection->prepare("INSERT INTO " . $tableName . "(" . implode(', ', $fields) . ", created_at) VALUES ( :" . implode(', :', $fields) . ", now() );");
            $statement->execute(array_combine($fields, $values));
            return true;
        } catch (Exception $e) {
            echo 'error ' . $e->getMessage();
            return false;
        }

    }

    // update('users', 2, ['email', 'age'], ['ali@yahoo.com', 20]);
    // 0 => 'ali@yahoo.com',
    public function update($tableName, $id, $fields, $values)
    {
        $sql = "UPDATE " . $tableName . " SET ";
        foreach (array_combine($fields, $values) as $field => $value) {
            if ($value) {
                $sql .= $field . ' = ?, ';
            } else {
                $sql .= $field . ' = NULL, ';
            }
        }
        $sql .= " updated_at = now()";
        $sql .= " WHERE id = ?";

        try {

            $statement = $this->connection->prepare($sql);
            $statement->execute(array_merge(array_filter(array_values($values)), [$id]));
            return true;
        } catch (Exception $e) {
            echo 'error ' . $e->getMessage();
            return false;
        }

    }

    // delete('users', 2)
    public function delete($tableName, $id)
    {
        $sql = "DELETE FROM " . $tableName . " WHERE id = ?";
        try {
            $statement = $this->connection->prepare($sql);
            $statement->execute([$id]);
            return true;
        } catch (Exception $e) {
            echo 'error ' . $e->getMessage();
            return false;
        }

    }

    public function createTable($query)
    {
        try {
            $this->connection->exec($query);
            return true;
        } catch (Exception $e) {
            echo 'error ' . $e->getMessage();
            return false;
        }
    }

}
