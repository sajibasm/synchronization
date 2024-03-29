<?php

namespace app\components;

class SchemaObject
{

    public $schemaName;
    public $name;
    public $fullName;
    public $engine;
    public $index = [];
    public $primaryKey;
    public $sequenceName;
    public $foreignKeys;
    public $columns;
    public $totalRows;
    public $columnCollations;

    /**
     * @param $schemaName
     */
    public function __construct($schema)
    {
        if (is_object($schema)) {
            $this->schemaName = $schema->schemaName;
            $this->name = $schema->name;
            $this->fullName = $schema->fullName;
            $this->primaryKey = $schema->primaryKey;
            $this->sequenceName = $schema->sequenceName;
            $this->foreignKeys = $schema->foreignKeys;
            $this->columns = $schema->columns;
            $this->index = [];
        }
    }


    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }


    /**
     * @param mixed $engine
     */
    public function setEngine(Engine $engine): void
    {
        $this->engine = $engine;
    }


    /**
     * @param mixed $index
     */
    public function setIndex(array $index): void
    {
        $this->index = $index;
    }

    public function setColumnCollations(array $columnCollations)
    {
        $this->columnCollations = $columnCollations;
    }

    public function setTotalRows(int $row)
    {
        $this->totalRows = $row;
    }
}