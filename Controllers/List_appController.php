<?php

namespace Controllers;

use Models\List_app;
use Models\Board;
use Models\Card;

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

        $boardId = $_POST['id_board'];

        // Security to check if the board list can be added in this board

        if (!Board::checkBoardOwnership($boardId, parent::getCurrentUserId())) {
            return $this->responseJson(['message' => 'Nous ne pouvons pas ajouter cet élément.', 'success' => false]);
        }

        if (empty($_POST['name'])) {
            return $this->responseJson(['message' => 'Nous ne pouvons pas ajouter cet élément.', 'success' => false]);
        }

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
                    'position_list_app' => $list->position_list_app,
                    // 'creation_date_list_app' => ,
                    'id_board' => $list->id_board
                ], 'success' => true
            ];
        } else {
            $json = [
                'message' => 'Nous ne pouvons pas ajouter cet élément.', 'success' => false
            ];
        }

        return $this->responseJson($json);
    }

    /**
     * @return null|void
     */
    public function update()
    {

        $ListId = $_POST['id'];

        // Security to check if the list is updatable by user

        if (!List_app::checkListOwnership($ListId, parent::getCurrentUserId())) {
            return $this->responseJson(['message' => "Nous n'avons pas trouvé cet élément.", 'success' => false]);
        }

        if (empty($_POST['name'])) {
            return $this->responseJson(['message' => "Nous n'avons pas trouvé cet élément.", 'success' => false]);
        }

        $id = $_POST['id'];
        $data = [
            'id' => $id,
            'name_list_app' => $_POST['name']
        ];

        List_app::update($data, $id);

        return $this->responseJson(['success' => true]);
    }

    /**
     * @return null|void
     */
    public function delete()
    {

        $list = $_POST['id'];

        // Security to check if the list can be deleted by user

        if (!List_app::checkListOwnership($list, parent::getCurrentUserId())) {
            return $this->responseJson(['message' => "Nous n'avons pas trouvé cet élément.", 'success' => false]);
        }

        List_app::delete($list);

        return $this->responseJson(['success' => true]);
    }
}
