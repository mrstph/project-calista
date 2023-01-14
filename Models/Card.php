<?php

// namespace Models;

// use PDO;

// class Card extends Model
// {
//     /**
//      * The DB table name.
//      *
//      * @var string
//      */
//     protected $table = 'list_app';

//     public $id;
//     public $name_list_app;
//     public $creation_date_list_app;
//     public $position_list_app;
//     public $id_board;

//     /**
//      * fetch() + hydrate()
//      *
//      * @param int|string $id
//      * @return List_app
//      */
//     public static function find($id): List_app
//     {
//         return parent::find($id);
//     }

//     /**
//      * @param int|string $id
//      * @return bool
//      */
//     public static function updateList_app(array $data)
//     {
//         return parent::update($data);
//     }

//     /**
//      * Create a row List_app in BD.
//      *
//      * @param array $data
//      * @return List_app
//      */
//     public static function createList_app(array $data): List_app
//     {
//         return parent::create($data);
//     }

//     /**
//      * @return User
//      */
//     public function user(): User_app
//     {
//         return User_app::find($this->id);
//     }

//     /**
//      * @return Card
//      */
//     public function showcard(): array
//     {
//         $model = new Card();

//         return $this->select("SELECT * FROM {$model->getTable()} WHERE id_list_pp = :list_id", [
//             'list_id' => $this->id,
//         ]);
//     }
// }
