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
}
