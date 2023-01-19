<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
    <meta name="description" content="???">
    <meta name="author" content="Chris Balla & Stéphane Muller">
    <title>Calista | <?php echo ($board->name_board); ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/pictures/favicon.svg">

    <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <?php if ($board->color_board === "blue") {
        echo ('<link rel="stylesheet" href="/assets/css/root-blue-theme.css">');
    } else if ($board->color_board === "red") {
        echo ('<link rel="stylesheet" href="/assets/css/root-red-theme.css">');
    } else if ($board->color_board === "orange") {
        echo ('<link rel="stylesheet" href="/assets/css/root-orange-theme.css">');
    } else {
        echo ('<link rel="stylesheet" href="/assets/css/root-blue-theme.css">');
    }
    ?>

    <link rel="stylesheet" href="/assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>
<body>
    <header>
        <?php require view_path('/components/nav.php'); ?>
    </header>

    <main>

        <div class="dashboard container-fluid overflow-auto">
            <div class="container-fluid">

                <!-- ~~~~ SHOW MESSAGE IF SET ~~~ -->

                <?php require view_path('components/message.php'); ?>

                <!-- <ul class="list-group list-group-horizontal">
                <li class="list-group-item flex-fill">An item</li>
                <li class="list-group-item flex-fill">A second item</li>
                <li class="list-group-item flex-fill">A third item</li>
                <li class="list-group-item flex-fill">A fourth item</li>
                <li class="list-group-item flex-fill">And a fifth one</li>
            </ul> -->

                <div class="mt-4">
                    <ul class="list-group list-group-horizontal gap-2" id="lists">
                        <?php foreach ($lists as $list) : ?>
                            <ul class="list-test list-group-item list-group"><?php echo $list['name_list_app'] ?>
                                <li class="list-group">
                                    <!-- show cards for every list -->
                                <li class="list-group-item">An item</li>
                                <li class="list-group-item">An other item</li>
                                <li class="list-group-item">An other item</li>
                                <li class="list-group-item">An other item</li>
                                <li class="list-group-item">An other item</li>
                                <li class="list-group-item">An other item</li>
                            </ul>
                        <?php endforeach; ?>

                        <?php //foreach ($lists as $list) {
                        //echo '<li>'
                        //   . 'Title: ' . $list['name_list_app']
                        //   . ' / Id: ' . $list['id']
                        //. '</li>';
                        //}
                        ?>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-list">
                            Ajouter une liste
                        </button>
                    </ul>
                </div>

            </div>
        </div>
    </main>

    <!-- ~~~~~~~~~~ CREATE LIST MODAL ~~~~~~~~~~ -->

    <div class="modal fade" id="create-list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-list-create" method="post" action="/list_app/add.php">
                        <input type="text" name="id_board" id="id_board" value="<?php echo $board->id; ?>" hidden>
                        <input type="text" name="name" id="name">
                        <input type="submit" form="form-list-create" class="btn btn-primary" value="Créer" data-bs-dismiss="modal">
                    </form>
                </div>
                <div class="modal-footer">
                    <input type="submit" form="form-list-create" class="btn btn-primary" value="Créer" data-bs-dismiss="modal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let myModal = document.getElementById('create-list');
        let myInput = document.getElementById('name');
        let button = document.querySelectorAll('input[typer="submit"]');

        //when modal is shown, put the focus on the input field
        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus();
        });
        //when modal is hidden, reset the value of the input field
        myModal.addEventListener('hidden.bs.modal', () => {
            myInput.value = "";
        });
    </script>

    <script>
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
                        document.getElementById('lists').innerHTML =
                            document.getElementById('lists').innerHTML + (
                                '<li>' +
                                'Title: ' + json.list.name_list_app +
                                ' / Id: ' + json.list.id +
                                ' / Position: ' + json.list.position +
                                '</li>');
                        console.log(json);
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
    </script>

</body>
</html>
