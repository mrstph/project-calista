<?php

namespace Models;

use PDO;
use PDOException;

abstract class Model
{
    /**
     * The current PDO connection.
     *
     * @var PDO
     */
    protected static $db;

    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table;

    /**
     * The default table identifier.
     *
     * @var string
     */
    protected $identifier = 'id';

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return self
     */
    public static function find($id)
    {
        $model = new static();

        return $model->hydrate(
            $model->first($id)
        );
    }

    /**
     * Fetch data row in DB based on identifier
     *
     * @param int|string $id
     * @return array
     */
    public function first($id): array
    {
        $req = self::db()->prepare("SELECT * FROM {$this->getTable()} WHERE {$this->getIdentifier()} = :id LIMIT 1");
        $req->execute([':id' => $id]);

        return $req->fetch(PDO::FETCH_ASSOC) ?? [];
    }

    /**
     * Hydrate current model process.
     *
     * @param array $data
     * @return self
     */
    public function hydrate(array $data): self
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }

        return $this;
    }

    /**
     * Execute a SQL and Get the result in array.
     *
     * @param string $sql
     * @param array $data
     * @param int|null $limit
     * @param int $mode
     * @return array
     */
    public static function executeSql(string $sql, array $data = [], ?int $limit = null, int $mode = PDO::FETCH_ASSOC): array
    {
        $builder = new static();

        if ($limit) {
            $sql .= ' LIMIT ' . $limit;
        }

        $req = $builder::db()->prepare($sql);
        $req->execute($data);

        if ($limit === 1) {
            return $req->fetch($mode); // ['id' => X, 'X' => 'X', ...]
        } else {
            return $req->fetchAll($mode); // [ ['id' => X, ...], ['id' => X, ...] ]
        }
    }

    /**
     * Get the table name.
     *
     * @return string
     * @throws \Exception
     */
    public function getTable()
    {
        if (empty($this->table)) {
            throw new \Exception('The model "' . __CLASS__ . '" $table is empty !');
        }

        return $this->table;
    }

    /**
     * Get the table identifier name.
     *
     * @return string
     * @throws \Exception
     */
    public function getIdentifier()
    {
        if (empty($this->identifier)) {
            throw new \Exception('The model "' . __CLASS__ . '" $identifier is empty !');
        }

        return $this->identifier;
    }

    /**
     * Return the current PDO instance.
     * Loads the PDO instance if it is not loaded.
     *
     * @return PDO
     */
    public static function db()
    {
        if (self::$db === null) {
            self::openConnection();
        }

        return self::$db;
    }

    /**
     * @return void
     */
    public static function closeConnection()
    {
        self::$db = null;
    }

    /**
     * @return void
     */
    protected static function openConnection()
    {
        $DSN = DB_PDO_DRIVER
            . ':host=' . DB_HOSTNAME
            . ';port=' . DB_PORT
            . ';dbname=' . DB_DATABASE;

        try {
            self::$db = new PDO($DSN, DB_USERNAME, DB_PASSWORD, [
                PDO::ATTR_PERSISTENT => true, // Option for shared PDO connection
            ]);
        } catch (PDOException $e) {
            echo $e->getMessage() . '<br>';
            exit();
        }
    }
}
