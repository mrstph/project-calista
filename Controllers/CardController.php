<?php

namespace Controllers;

use Models\Card;
use Models\List_app;

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

        $ListId = $_POST['id_list'];
        $name = $_POST['name_card'];
        $content =  $_POST['content_card'];

        // if (!List_app::checkListOwnership($ListId, parent::getCurrentUserId())) {
        //     return $this->responseJson(['message' => 'Nous ne pouvons pas ajouter cet élément.', 'success' => false]);
        // }

        // Insert DB
        $card = Card::createCard([
            'id_list_app' => $ListId,
            'name_card' => $name,
            'content_card' => $content
        ]);

        if ($card) {
            $json = [
                'card' => [
                    'id' => $card->id,
                    'name_card' => $card->name_card,
                    'content_card' => $card->content_card,
                    'id_list_app' => $card->id_list_app

                    // 'position_list_app' => $list->position_list_app,
                    // 'creation_date_list_app' => ,
                ], 'success' => true
            ];
        } else {
            $json = [
                'error' => 'An error has occured !',
            ];
        }
        return $this->responseJson($json);
    }
}
