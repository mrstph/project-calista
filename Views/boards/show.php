<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
    <meta name="description" content="???">
    <meta name="author" content="Chris Balla & Stéphane Muller">
    <title>Calista | <?php echo ($board->name_board); ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/pictures/favicon.svg">

    <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <!-- ~~~~ THEME CSS FILE  ~~~~ -->
    <link rel="stylesheet" href="/assets/css/root-<?php echo $board->color_board; ?>-theme.css">
    <link rel="stylesheet" href="/assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <?php require view_path('/components/nav.php'); ?>
        <?php require view_path('/components/board-ruban.php'); ?>
    </header>

    <main>

        <div class="dashboard container-fluid overflow-auto">
            <div class="container-fluid">

                <!-- ~~~~ SHOW MESSAGE IF SET ~~~ -->

                <?php require view_path('components/message.php'); ?>


                <div class="mt-4">

                    <!-- ~~~~~~~~~~ DISPLAYING LISTS & CARDS  ~~~~~~~~~~ -->

                    <ul id="lists" class="list-group list-group-horizontal gap-3">
                        <?php foreach ($lists as $list) : ?>
                            <li id="<?php echo "list-". $list['id']?>" class="list-style list-group">
                                <div class="list-group-item list-group">
                                    <h3><?php echo $list['name_list_app'] ?></h3>
                                        <div class="my-2">
                                            <button data-id="<?php echo $list['id']?>" type="button" class="modify-list-button btn btn-primary" data-bs-toggle="modal" data-bs-target="#modify-list">
                                                Modifier
                                            </button>
                                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-list">
                                                Supprimer
                                            </button>
                                        </div>
                                    <ul class="list-group">
                                        <?php foreach ($list['cards'] as $card) : ?>
                                        <li class="list-group my-2" data-id="<?php echo $card['id']?>">
                                            <div class="list-group-item">
                                                <h4><?php echo $card['name_card']?></h4>
                                                <p><?php echo $card['content_card']?></p>
                                                <div class="my-2">
                                                <button data-id="<?php echo $list['id']?>" type="button" class="modify-card-button btn btn-primary" data-bs-toggle="modal" data-bs-target="#modify-card">
                                                    Modifier
                                                </button>
                                                <button type="button" class="btn btn-danger delete-card-button" data-bs-toggle="modal" data-bs-target="#delete-card">
                                                    Supprimer
                                                </button>
                                            </div>
                                            </div>
       
                                        </li>
                                        <?php endforeach;
                                        ?>
                                    </ul>
                                </div>
                            </li>
                        <?php endforeach; ?>
                        <li>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-list">
                                Ajouter une liste
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </main>

    <!-- ~~~~~~~~~~ CREATE LIST MODAL - OK ~~~~~~~~~~ -->

    <div class="modal fade" id="create-list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Ajouter une liste</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-list-create" method="post" action="/list_app/add.php">
                        <input type="text" name="id_board" id="id_board" value="<?php echo $board->id; ?>" hidden>
                        <input class="mb-2 form-control" type="text" name="name" id="name" placeholder="Nom de liste">
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" form="form-list-create" class="btn btn-primary" value="Créer" data-bs-dismiss="modal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ~~~~~~~~~~ MODIFY LIST MODAL - TESTING ~~~~~~~~~~ -->

    <div class="modal fade" id="modify-list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier : <?php echo $list['name_list_app']?></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-modify-list" method="post" action="/list_app/update.php">
                        <input class="mb-2 form-control" type="text" name="name" id="name-modify-list" value="">
                        <input type="text" name="id" id="id-modify-list" value="" hidden>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" form="form-modify-list" class="btn btn-primary modify-list-button" value="Modifier" data-bs-dismiss="modal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ~~~~~~~~~~ MODIFY BOARD MODAL ~~~~~~~~~~ -->

    <div class="modal fade" id="modify-board" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Modifier : <?php echo ($board->name_board) ?></h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-modify-board" method="post" action="/boards/update.php">
                        <input type="text" name="id_board" id="id_board" value="<?php echo $board->id; ?>" hidden>
                        <input class="mb-2 form-control" type="text" name="name" id="name" placeholder="Nom du tableau">
                        <div class="btn-group" role="group" aria-label="Basic radio toggle button group" style="width:100%;">
                            <input type="radio" class="btn-check" name="color" id="btnradio1" autocomplete="off" value="blue">
                            <label class="btn btn-outline-primary" for="btnradio1">Bleu</label>

                            <input type="radio" class="btn-check" name="color" id="btnradio2" autocomplete="off" value="red">
                            <label class="btn btn-outline-primary" for="btnradio2">Rouge</label>

                            <input type="radio" class="btn-check" name="color" id="btnradio3" autocomplete="off" value="orange">
                            <label class="btn btn-outline-primary" for="btnradio3">Orange</label>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" form="form-modify-board" class="btn btn-primary" value="Modifier" data-bs-dismiss="modal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ~~~~~~~~~~ DELETE BOARD MODAL ~~~~~~~~~~ -->

    <div class="modal fade" id="delete-board" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Supprimer : <?php echo $board->name_board ?> </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-delete-board" method="post" action="/boards/delete.php">
                        <input type="text" name="id_board" id="id_board" value="<?php echo $board->id; ?>" hidden>
                        <p class="text-justify">Êtes vous sûr de vouloir supprimer le tableau <strong><?php echo $board->name_board; ?></strong> ? <br>Tout son contenu sera supprimé et ne pourra être récupéré. Cette action est irreversible.<br> Pour continuer, écrivez "SUPPRIMER" en majuscule dans le champ ci-dessous puis cliquez sur supprimer.
                        </p>
                        <input class="mb-2 form-control" type="text" name="delete" id="delete" placeholder="SUPPRIMER">
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" form="form-delete-board" class="btn btn-danger" value="Supprimer" data-bs-dismiss="modal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let createList = document.getElementById('create-list');
        let modifyList = document.getElementById('modify-list');
        let modifyBoard = document.getElementById('modify-board');
        let myInput = document.getElementById('name');

        //when modal is shown, put the focus on the input field
        createList.addEventListener('shown.bs.modal', () => {
            myInput.focus();
        });

        //when modal is shown, put the focus on the input field
        modifyList.addEventListener('shown.bs.modal', () => {
            myInput.focus();
        });
        
        //when modal is hidden, reset the value of the input field
        createList.addEventListener('hidden.bs.modal', () => {
            myInput.value = "";
        });

        // DELETE CARDS
        Array.from(document.getElementsByClassName('delete-card-button')).forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                const id = event.target.getAttribute('data-id');
                let form = new FormData();
                form.append('id', id);

                fetch("/cards/delete.php", {
                    method: "POST",
                    body: form,
                })
                // .then((response) => response.text().then((value) => console.log(value))) // FOR DEBUG
                .then((response) => response.json())
                .then((json) => {
                    if (json.success) {
                        event.target.remove();
                    } else {
                        // ERROR
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
            });
        });

        //MODIFY MODAL LIST
        Array.from(document.getElementsByClassName('modify-list-button')).forEach(function(element) {
            element.addEventListener('click', function(event) {
                const id = event.target.getAttribute('data-id');
                let listLi = document.getElementById('list-' + id).querySelector('h3').textContent;
                document.getElementById('name-modify-list').setAttribute("value",listLi);
                document.getElementById('id-modify-list').setAttribute("value",id);;
            });
        });

        // MODIFY LIST
        Array.from(document.getElementsByClassName('modify-list-button')).forEach(function(element) {
            element.addEventListener('click', function(event) {
                event.preventDefault();
                const id = event.target.getAttribute('data-id');
                let form = new FormData();
                form.append('id', id);


                fetch("/list_app/update.php", {
                    method: "POST",
                    body: form,
                })
            // .then((response) => response.text().then((value) => console.log(value))) // FOR DEBUG
                .then((response) => response.json())
                .then((json) => {
                    if (json.success) {
                        // event.target.; // new html with updated title
                    } else {
                        // ERROR
                    }
                })
                .catch((error) => {
                    console.error(error);
                });
            });
        });

        // ADD LIST
        document
            .getElementById('form-list-create')
            .addEventListener('submit', function(event) {
                event.preventDefault();
                // FORM
                fetch("/list_app/add.php", {
                        method: "POST",
                        body: new FormData(event.target),
                    })
                    // .then((response) => response.text().then((value) => console.log(value))) // FOR DEBUG
                    .then((response) => response.json())
                    .then((json) => {

                        let ul = document.getElementById('lists');
                        ul.innerHTML += `<li>
                                    <div class="list-group-item list-group">
                                        <h3>` + json.list_app.name_list_app + `</h3>
                                        <ul class="list-group">
                                            <li>
                                                <div class="list-group-item">
                                                    <h3>value</h3>
                                                    <p>value</p>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </li>`;

                        console.log(json);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
    </script>

</body>

</html>