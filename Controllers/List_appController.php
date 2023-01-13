<?php

namespace Controllers;

use Models\List_app;

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
            // 'board_id' => $_POST['board_id'],
            // 'title' => $_POST['title'],
            'id_board' => $_POST['idboard'],
            'id_name' => $_POST['nameboard'],
        ]);

        if ($list) {
            $json = [
                'list_app' => [
                    'id_list_app' => $list->id_list_app,
                    'id_board' => $list->id_board,
                    'position_list_app' => $list->position_list_app,
                    'name_list_app' => $list->name_list_app,
                ],
            ];
        } else {
            $json = [
                'error' => 'An error has occured !',
            ];
        }

        return $this->responseJson($json);
    }
}
