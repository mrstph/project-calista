<?php

namespace Models;

class Board extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'boards';

    public $id;
    public $user_id;
    public $title;

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return Board
     */
    public static function find($id): Board
    {
        return parent::find($id);
    }

    /**
     * @param int|string $id
     * @return bool
     */
    public static function update($id, array $data)
    {
        // CODE
    }

    /**
     * Create a row Borad in BD.
     *
     * @param array $data
     * @return Board
     */
    public static function create(array $data): Board
    {
        return parent::create($data);
    }

    /**
     * @return User
     */
    public function user(): User
    {
        return User::find($this->user_id);
    }

    /**
     * @return Enumeration
     */
    public function enumerations(): array
    {
        $model = new Enumeration();

        return $this->select("SELECT * FROM {$model->getTable()} WHERE board_id = :board_id", [
            'board_id' => $this->id,
        ]);
    }
}
