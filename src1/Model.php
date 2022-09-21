<?php

namespace Hillel;

use InvalidArgumentException;

class Model
{
    public $id;
    public $name;
    public $email;
    public $sql;

    public function __construct()
    {
    }

    public function findUser($id)
    {
        $this->id = $id;
        $tableName = strtolower(static::class);
        $tableName = str_replace(strtolower(__NAMESPACE__) . '\\', '', strtolower($tableName)) . 's';

        $this->sql = $this->getQuery("SELECT * FROM {$tableName} WHERE id = :id");
        return $this;
    }

    private function getTable()
    {
        $tableName = strtolower(get_class($this));
        return str_replace(strtolower(__NAMESPACE__) . '\\', '', strtolower($tableName)) . 's';
    }

    private function getQuery($sql)
    {
        $data = get_object_vars($this);

        foreach ($data as $key => $val) {
            $sql = str_replace(':' . $key, "'{$val}'", $sql);
        }
        return $sql;
    }

    public function create()
    {
        $this->sql = $this->getQuery("INSERT INTO {$this->getTable()} (id, name, email) VALUES (:id, :name, :email)");
        return $this;
    }

    public function delete()
    {
        $this->sql = ($this->getQuery("DELETE FROM {$this->getTable()} WHERE id = :id"));
        return $this;
    }

    public function update()
    {
        $this->sql = ($this->getQuery("UPDATE {$this->getTable()} SET name = :name, email = :email WHERE id = :id"));
        return $this;
    }
}