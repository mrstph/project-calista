<?php

namespace Controllers;

use PDO;
use Models\Board;
use Models\List_app;
use Models\User_app;

class User_appController extends Controller
{
    /**
     * User_appController constructor.
     */
    public function __construct()
    {
        // Checks if the user is logged in otherwise redirects
        $this->redirectIfNotAuthenticated();

        parent::__construct();
    }

    /**
     * @return null|void
     */
    public function show()
    {
        // $UserId = $_GET['id'] ?? null;
        // if (!empty($UserdId)) {
        //     return redirect('/home.php');
        // }

        // $UserId = User_app::find($UserId);
        // dd($UserId);
        // $lists = $board->listapp();
        // Sort lists by position
        // usort($lists, fn ($a, $b) => $a['position'] <=> $b['position']);
        return $this->view('/profile.php');
    }


    /**
     * @return null|void
     */
    public function update()
    {
        $name_board = $_POST['name'];
        $color_board = $_POST['color'];
        $id = $_POST['id_board'];
        $data = [
            'name_board' => $name_board,
            'color_board' =>  $color_board,
            'id' => $id
        ];

        Board::update($data, $id); //$board = Board::update($boardId, $data);

        return redirect('/boards/show.php?id=' . $id);
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
