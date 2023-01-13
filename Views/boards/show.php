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
        <h4>Ajouter une liste</h4>
        <form id="form-list-create">
            <input type="text" name="board_id" id="board_id" value="<?php echo $board->id ?>" hidden>
            <input type="text" name="title" id="title">
            <input type="submit" value="Ajouter une liste">
        </form>

        <ul id="list_app">
            <?php foreach ($lists as $list) {
                echo '<li>'
                    . 'Title: ' . $list['title']
                    . ' / Id: ' . $list['id']
                    . ' / Position: ' . $list['position']
                    . '</li>';
            } ?>
        </ul>
    </main>

    <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/javascript/javascript.js"></script>
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
                                'Title: ' + json.list.title +
                                ' / Id: ' + json.list.id +
                                ' / Position: ' + json.list.position +
                                '</li>');
                    })
                    .catch((error) => {
                        console.error(error);
                    });
            });
    </script>

</body>

</html>