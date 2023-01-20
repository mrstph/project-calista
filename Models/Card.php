<?php

namespace Models;

use PDO;

class Card extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'card';

    public $id;
    public $name_card;
    public $position_card;
    public $creation_date_card;
    public $starting_date_card;
    public $due_date_card;
    public $content_card;
    public $color_card;
    public $id_list_app;

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return Card
     */
    public static function find($id): Card
    {
        return parent::find($id);
    }

    /**
     * @param int|string $id
     * @return bool
     */
    public static function updateCard(array $data, $id) //define $id
    {
        return parent::update($data, $id);
    }

    /**
     * Create a row Card in BD.
     *
     * @param array $data
     * @return Card
     */
    public static function createCard(array $data): Card
    {

        $model = new static();

        $lastPosition = $model::select("SELECT MAX(position_card) as position FROM {$model->getTable()}", [], 1)['position'];

        $data = array_merge(
            $data,
            ['position_card' => ($lastPosition + 1)]
        );

        return parent::create($data);
    }

    //NOT SURE ABOUT THE CREATION CARD POSITION THING

    /**
     * @return User
     */
    public function user(): User_app
    {
        return User_app::find($this->id);
    }

    /**
     * @return Card
     */
    public function showCard(): array
    {
        $model = new Card();

        return $this->select("SELECT * FROM {$model->getTable()} WHERE id_list_app = :list_id", [
            'list_id' => $this->id,
        ]);
    }

    /**
     * Return all cards from a list.
     * @return Card
     */
    public static function getCardsFromListIds(array $listIds): array
    {
        $model = new Card();

        return $model->select("SELECT * FROM {$model->getTable()} WHERE id_list_app IN (:list_ids)", [
            'list_ids' => implode(',', $listIds),
        ]);
    }

    /**
     * Check if the user can modify the card.
     * @return bool
     */
    public static function checkCardOwnership($idCard, $idUser): bool
    {
        $ListModel = new List_app();
        $BoardModel = new Board();
        $UserModel = new User_app();
        $CardModel = new Card();

        $result = self::select(
            "SELECT card.id FROM {$CardModel->getTable()} 
            INNER JOIN {$ListModel->getTable()} 
            ON card.id_list_app = list_app.id
            INNER JOIN {$BoardModel->getTable()}
            ON list_app.id_board = board.id
            INNER JOIN {$UserModel->getTable()}
            ON board.id_user_app = user_app.id
            WHERE user_app.id = :idUser and card.id = :idCard",
            [
                ':idCard' => $idCard,
                ':idUser' => $idUser
            ],
            1
        );

        return (!empty($result));
    }
}
