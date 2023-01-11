<?php

namespace Controllers;

use Models\Board;
use Models\Enumeration;
use Models\User;

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
        $data = [
            // ... $_POST
        ];

        $board = Board::create($data);

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
        $lists = $board->enumerations();

        // Sort lists by position
        usort($lists, fn ($a, $b) => $a['position'] <=> $b['position']);

        return $this->view('boards/show.php', [
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
        $boardId = $_POST['id'];
        Board::delete($boardId);

        return redirect('/home.php');
    }
}
