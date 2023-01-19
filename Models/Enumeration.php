<?php

namespace Models;

class Enumeration extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'enumerations';

    public $id;
    public $board_id;
    public $position;
    public $title;

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return Enumeration
     */
    public static function find($id): Enumeration
    {
        return parent::find($id);
    }

    /**
     * @param int|string $id
     * @return Enumeration
     */
    public static function create(array $data): Enumeration
    {
        $model = new static();

        $lastPosition = $model::select("SELECT MAX(position) as position FROM {$model->getTable()}", [], 1)['position'];

        $data = array_merge(
            $data, ['position' => ($lastPosition + 1)]
        );

        return parent::create($data);
    }

    /**
     * @return User
     */
    public function board(): Board
    {
        return Board::find($this->board_id);
    }
}
