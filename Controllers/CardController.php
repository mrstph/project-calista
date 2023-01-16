<?php

namespace Controllers;

use Models\Card;

class CardController extends Controller
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
        $card = Card::createCard([
            'id_list' => $_POST['id_list'],
            'name_card' => $_POST['name_card'],
            'content_card' => $_POST['content_card']
        ]);

        if ($card) {
            $json = [
                'card' => [
                    'id' => $card->id,
                    'name_list_app' => $card->name_card,
                    'id_list' => $card->id_list
                    // 'position_list_app' => $list->position_list_app,
                    // 'creation_date_list_app' => ,
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
