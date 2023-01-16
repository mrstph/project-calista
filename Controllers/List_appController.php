<?php

namespace Controllers;

use Models\List_app;
use Models\Board;

class List_appController extends Controller
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
        // Insert DB
        $list = List_app::create([
            'id_board' => $_POST['id_board'],
            'name_list_app' => $_POST['name'],
        ]);

        if ($list) {
            $json = [
                'list_app' => [
                    'id' => $list->id,
                    'name_list_app' => $list->name_list_app,
                    // 'position_list_app' => $list->position_list_app,
                    // 'creation_date_list_app' => ,
                    'id_board' => $list->id_board
                ],
            ];
        } else {
            $json = [
                'error' => 'An error has occured !',
            ];
        }
        return $this->responseJson($json);
    }

    // ajout de chris à customiser

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
        if (empty($_POST['name']) && empty($_POST['color'])) {
            $id = $_POST['id_board'];
            return redirect('/boards/show.php?id=' . $id);
        }

        if (empty($_POST['name'])) {
            $color_board = $_POST['color'];
            $id = $_POST['id_board'];
            $data = [
                'color_board' =>  $color_board,
                'id' => $id
            ];
        }

        if (!empty($_POST['name'])) {
            $name_board = $_POST['name'];
            $id = $_POST['id_board'];
            $data = [
                'name_board' => $name_board,
                'id' => $id
            ];
        }

        if (!empty($_POST['name'] && !empty($_POST['color']))) {
            $name_board = $_POST['name'];
            $color_board = $_POST['color'];
            $id = $_POST['id_board'];
            $data = [
                'name_board' => $name_board,
                'color_board' =>  $color_board,
                'id' => $id
            ];
        }

        Board::updateBoard($data, $id);

        return redirect('/boards/show.php?id=' . $id);
    }

    /**
     * @return null|void
     */
    public function delete()
    {
        $boardId = $_POST['id_board'];
        $delete = $_POST['delete'];

        if ($delete === "SUPPRIMER") {
            Board::delete($boardId);
            messages('Votre tableau a été supprimé avec succès.', 'alert-success');
            return redirect('/home.php');
        } else {
            messages('Veuillez écrire "SUPPRIMER" en majuscule pour supprimer le tableau.');
            return redirect('/boards/show.php?id=' . $boardId);
        }
    }
}
