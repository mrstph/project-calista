<?php

namespace Controllers;

use PDO;
use Models\Board;
use Models\List_app;
use Models\User_app;

class BoardsController extends Controller
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        // Vérifie si l'utilisateur est connecté sinon redirection
        $this->redirectIfNotAuthenticated();

        parent::__construct();
    }

    /**
     * @return null|void
     */
    public function add()
    {
        $name_board = $_POST['nameboard'];
        $color_board = $this->checkColor($_POST['color']);
        $id_user_app = session('id');
 
        $data = [
            'name_board' => $name_board,
            // 'cration_date_board' => /* date now*/,
            // 'position_board' => /* next position */,
            'color_board' => $color_board,
            'id_user_app' => $id_user_app
        ];

        $board = Board::createBoard($data);
        // $id_board = Board::find();
        // $id = Board::find($id);
        return redirect('boards/show.php?id='. $board->id_board);
    }

    /**
     * @return null|void
     */
    public function show()
    {
        $boardId = $_GET['id'] ?? null;
        if (empty($boardId)) {
            return redirect('/home.php');
        }

        $board = Board::find($boardId);
        $lists = $board->listapp();
        // Sort lists by position
        // usort($lists, fn ($a, $b) => $a['position'] <=> $b['position']);
        return $this->view('/boards/show.php', [
            'board' => $board,
            'lists' => $lists,
        ]);
    }

    /**
     * @return null|void
     */
    public function update()
    {
        if (empty($_POST['name'])){   
            $color_board = $_POST['color'];
            $id = $_POST['id_board'];
            $data = [
                'color_board' =>  $color_board,
                'id' => $id
            ];
        }

        if(!empty($_POST['name'])){
            $name_board = $_POST['name'];
            $color_board = $_POST['color'];
            $id = $_POST['id_board'];
            $data = [
                'name_board' => $name_board,
                'color_board' =>  $color_board,
                'id' => $id
            ];
        }

        Board::updateBoard($data, $id); //$board = Board::update($boardId, $data);

        return redirect('/boards/show.php?id=' . $id);
    }

    /**
     * @return null|void
     */
    public function delete()
    {
        $boardId = $_POST['id_board'];
        $delete = $_POST['delete'];

        if ($delete === "SUPPRIMER"){
            Board::delete($boardId);
            messages('Votre tableau a été supprimé avec succès.', 'alert-success');
            return redirect('/home.php');
        } else {
            messages('Veuillez écrire "SUPPRIMER" en majuscule pour supprimer le tableau.');
            return redirect('/boards/show.php?id=' . $boardId);
        }
    }

    /**
     * @return string
     */
    public function checkColor($color)
    {
        // if($color != 'blue' or $color != 'red' or $color != 'orange' or $color == null){
        //     $color = 'blue';
        //     return $color;

        // }
        // return $color;
        if($color == 'red'){
            return $color;
        } else if ($color == 'blue'){
            return $color;
        } else if ($color == 'orange'){
            return $color;
        } else {
            return $color = 'blue';
        }
    }
}