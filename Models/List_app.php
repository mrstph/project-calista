<?php

namespace Models;

use PDO;

class List_app extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'list_app';

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
     * @param int|string $id
     * @return bool
     */

    public static function updateList_app(array $data, $id)
    {
         return parent::update($data, $id);
    }

    /**
     * @return User
     */
    public function board(): Board
    {
        return Board::find($this->id);
    }

    /**
     * @return array
     */
    public function cards()
    {
        $CardModel = new Card();

        $req = $this->db()->prepare("SELECT * FROM {$CardModel->getTable()} WHERE id_list_app = :id");
        $req->execute([
            ':id' => $this->id,
        ]);

        return $req->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
}
