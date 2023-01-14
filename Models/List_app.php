<?php

namespace Models;

class List_app extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'list_app';

    // public $id;
    // public $board_id;
    // public $position;
    // public $title;

    public $id;
    public $name_list_app;
    public $position_list_app;
    public $creation_date_list_app;
    public $id_board;

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return List_app
     */
    public static function find($id): List_app
    {
        return parent::find($id);
    }

    /**
     * @param int|string $id
     * @return List_app
     */
    public static function create(array $data): List_app
    {
        $model = new static();

        $lastPosition = $model::select("SELECT MAX(position_list_app) as position FROM {$model->getTable()}", [], 1)['position'];

        $data = array_merge(
            $data,
            ['position_list_app' => ($lastPosition + 1)]
        );

        return parent::create($data);
    }

    /**
     * @return User
     */
    public function board(): Board
    {
        return Board::find($this->id);
    }
}
