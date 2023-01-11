<?php

namespace Controllers;

use Models\Enumeration;

class EnumerationsController extends Controller
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
        $list = Enumeration::create([
            'board_id' => $_POST['board_id'],
            'title' => $_POST['title'],
        ]);

        if ($list) {
            $json = [
                'list' => [
                    'id' => $list->id,
                    'board_id' => $list->board_id,
                    'position' => $list->position,
                    'title' => $list->title,
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
