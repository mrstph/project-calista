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
    <link rel="stylesheet" href="/assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <?php require view_path('/components/nav.php'); ?>
    </header>

    <main>

        <h4>Supprimer tableau</h4>
        <form method="POST" action="/boards/delete.php">
            <input type="text" name="id" id="id_board" value="<?php echo $board->id; ?>" hidden>
            <input type="submit" value="Supprimer un tableau">
        </form>

        <h4>Modifier le tableau</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modify-board">
            Modifier le tableau
        </button>

        <h4>Ajouter une liste</h4>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create-list">
            Ajouter une liste
        </button>

        <ul id="lists">
            <?php foreach ($lists as $list) : ?>
                <div><?php echo $list['name_list_app'] ?></div>
            <?php endforeach; ?>

            <?php //foreach ($lists as $list) {
            //echo '<li>'
            //   . 'Title: ' . $list['name_list_app']
            //   . ' / Id: ' . $list['id']
            //. '</li>';
            //}
            ?>
        </ul>
    </main>

    <!-- ~~~~~~~~~~ ADD LIST MODAL ~~~~~~~~~~ -->

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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-modify-board" method="post" action="/boards/update.php">
                        <input type="text" name="id_board" id="id_board" value="<?php echo $board->id; ?>" hidden>
                        <input type="text" name="name" id="name">
                        <input type="text" name="color" id="color">
                        <input type="submit" form="form-modify-board" class="btn btn-primary" value="Modifier le tableau" data-bs-dismiss="modal">
                    </form>
                </div>
                <div class="modal-footer">
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