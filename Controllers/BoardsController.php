<?php

namespace Controllers;

use PDO;
use Models\Board;
// use Models\List_app;
// use Models\User_app;
use Models\Card;

class BoardsController extends Controller
{
    /**
     * HomeController constructor.
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
    public function add()
    {
        $name_board = trim($_POST['nameboard']);
        $color_board = $this->checkColor($_POST['color']); //check if the color is acceptable
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

        // Security to check if the Board is updatable by user
        
        if (!Board::checkBoardOwnership($boardId, parent::getCurrentUserId())) {
            messages("Nous n'avons pas trouvé cet élément.");
            return redirect('/home.php');
        }

        $board = Board::find($boardId);
        $lists = $board->listapp();

        $listIds = [];
        $newLists = [];

        foreach ($lists as $list) {
            $listIds[] = $list['id'];
            $newLists[$list['id']] = $list;
            $newLists[$list['id']]['cards'] = []; // newLists creates an empty array (that will content every card for that list) in all list's array. Each array matches the id of the list in it
        }

        $lists = $newLists; // $lists is an array that matches the id of list for convenience
        unset($newLists);

        $cards = Card::getCardsFromListIds($listIds);
        foreach ($cards as $card) {
            $lists[$card['id_list_app']]['cards'][] = $card; //fill every list'array with their cards
        }
        unset($cards);

        // Sort lists by position
        usort($lists, fn ($a, $b) => $a['position_list_app'] <=> $b['position_list_app']);
        foreach ($lists as &$list) {
            usort($list['cards'], fn ($a, $b) => $a['position_card'] <=> $b['position_card']);
        }

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

        // Security to check if the board is updatable by user

        $id = $_POST['id_board'];

        if (!Board::checkBoardOwnership($id, parent::getCurrentUserId())) {
            messages("Nous n'avons pas trouvé cet élément.");
            return redirect('/home.php');
        }


        if (empty($_POST['name']) && empty($_POST['color'])) {
            // $id = $_POST['id_board'];
            return redirect('/boards/show.php?id=' . $id);
        }

        if (empty($_POST['name'])) {
            $color_board = $_POST['color'];
            // $id = $_POST['id_board'];
            $data = [
                'color_board' =>  $color_board,
                'id' => $id
            ];
        }

        if (!empty($_POST['name'])) {
            $name_board = $_POST['name'];
            // $id = $_POST['id_board'];
            $data = [
                'name_board' => $name_board,
                'id' => $id
            ];
        }

        if (!empty($_POST['name'] && !empty($_POST['color']))) {
            $name_board = $_POST['name'];
            $color_board = $_POST['color'];
            // $id = $_POST['id_board'];
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

        // Security to check if the board can be deleted by this user

        if (!Board::checkBoardOwnership($boardId, parent::getCurrentUserId())) {
            messages("Nous n'avons pas trouvé cet élément.");
            return redirect('/home.php');
        }

        if ($delete === "SUPPRIMER") {
            Board::delete($boardId);
            messages('Votre tableau a été supprimé avec succès.', 'alert-success');
            return redirect('/home.php');
        } else {
            messages('Veuillez écrire "SUPPRIMER" en majuscule pour supprimer le tableau.');
            return redirect('/boards/show.php?id=' . $boardId);
        }
    }

    /**
     * Check if the color value is correct to match a defined CSS theme
     * @return null|void
     */
    public function checkColor($color)
    {
        if ($color == 'red') {
            return $color;
        } else if ($color == 'blue') {
            return $color;
        } else if ($color == 'orange') {
            return $color;
        } else {
            return $color = 'blue';
        }
    }
}
