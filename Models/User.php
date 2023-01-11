<?php

namespace Models;

use PDO;

class User extends Model
{
    /**
     * The DB table name.
     *
     * @var string
     */
    protected $table = 'users';

    public $id;
    public $email;
    public $password;
    public $name;

    /**
     * fetch() + hydrate()
     *
     * @param int|string $id
     * @return Model|self
     */
    public static function find($id)
    {
        return parent::find($id);
    }

    /**
     * @return array
     */
    public function boards()
    {
        $boardsModel = new Board();

        $req = $this->db()->prepare("SELECT * FROM {$boardsModel->getTable()} WHERE user_id = :user_id");
        $req->execute([
            ':user_id' => $this->id,
        ]);

        return $req->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    /**
     * @param string $email
     * @param string $password
     * @return false|User
     */
    public static function findUserByCredentials(string $email, string $password)
    {
        $userModel = new self();

        $result = $userModel::select(
            "SELECT * FROM {$userModel->getTable()} WHERE email = :email AND password = :password",
            [
                ':email' => $email,
                ':password' => $password,
            ],
            1
        );

        if (!$result) {
            return false;
        }

        return $userModel->hydrate($result);
    }


    /**
     * @param Board $borad
     * @return null|void
     */
    public function attachBoard(Board $borad) 
    {
        // CODE
    }
}
