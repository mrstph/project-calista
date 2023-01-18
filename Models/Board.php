<?php

namespace Models;

class Board extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'board';

    public $id;
    public $name_board;
    public $creation_date_board;
    public $position_board;
    public $color_board;
    public $id_user_app;

    // public function getName()
    // {
    //     return $this->name_board;
    // }

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

    public static function updateBoard(array $data, $id)
    {
        return parent::update($data, $id);
    }
    
    /**
     * Create a row Board in BD.
     *
     * @param array $data
     * @return Board
     */
    public static function createBoard(array $data): Board
    {
        return parent::create($data);
    }

    /**
     * @return User
     */
    public function user(): User_app
    {
        return User_app::find($this->id);
    }

    /**
     * @return List_App
     */
    public function listapp(): array
    {
        $model = new List_App();

        return $this->select("SELECT * FROM {$model->getTable()} WHERE id_board = :board_id", [
            'board_id' => $this->id,
        ]);
    }
}
