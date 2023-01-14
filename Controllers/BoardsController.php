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
        $color_board = $_POST['color'];
        $id = session('id');

        $data = [
            'name_board' => $name_board,
            // 'cration_date_board' => /* date now*/,
            // 'position_board' => /* next position */,
            'color_board' => $color_board,
            'id_user_app' => $id
        ];

        $board = Board::createBoard($data);
        return redirect('/boards/show.php?id=' . $board->id);
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
        $boardId = $_POST['id'];
        $data = [
            // ... $_POST
        ];

        $board = Board::update($boardId, $data);

        return redirect('/boards/show.php?id=' . $boardId);
    }

    /**
     * @return null|void
     */
    public function delete()
    {
        $boardId = $_POST['id']; //POST
        Board::delete($boardId);

        return redirect('/home.php');
    }
}
