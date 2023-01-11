<?php

namespace Models;

use PDO;

class User_app extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'user_app';

    public $id_user_app;
    public $email_user_app;
    public $type_account_user_app;
    public $password_user_app;
    public $first_name_user_app;
    public $last_name_user_app;
    public $state_of_account_user_app;
    public $color_user_app;
    public $profile_picture_user_app;
    public $creation_date_user_app;

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return Model|self
     */
    public static function find($id_user_app)
    {
        return parent::find($id_user_app);
    }

    /**
     * @return array
     */
    public function boards()
    {
        $boardsModel = new Board();

        $req = $this->db()->prepare("SELECT * FROM {$boardsModel->getTable()} WHERE user_id = :id_user");
        $req->execute([
            ':id_user' => $this->id_user_app,
        ]);

        return $req->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @param string $email
     * @param string $password
     * @return false|User
     */
    public static function findUserByCredentials(string $email_user_app, string $password_user_app)
    {
        $userModel = new self();

        $result = $userModel::select(
            "SELECT * FROM {$userModel->getTable()} WHERE email_user_app = :email AND password_user_app = :password",
            [
                ':email' => $email_user_app,
                ':password' => $password_user_app,
            ],
            1
        );

        if (!$result) {
            return false;
        }

        return $userModel->hydrate($result);
    }


    /**
     * @param Board $board
     * @return null|void
     */
    public function attachBoard(Board $board)
    {
        // CODE
    }
}
