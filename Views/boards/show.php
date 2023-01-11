<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Board - <?php echo $board->title ?></title>
</head>
<body>
    <header>
        <?php require view_path('components/menu.php'); ?>
    </header>

    <main>
        <h4>Ajouter une liste</h4>

        <form id="form-list-create">
            <input type="text" name="board_id" id="board_id" value="<?php echo $board->id ?>" hidden>
            <input type="text" name="title" id="title">
            <input type="submit" value="Ajouter une liste">
        </form>

        <ul id="lists">
            <?php foreach ($lists as $list) {
                echo '<li>'
                    .'Title: '.$list['title']
                    .' / Id: '.$list['id']
                    .' / Position: '.$list['position']
                    .'</li>';
            } ?>
        </ul>
    </main>

    <?php require view_path('components/footer.php'); ?>
<script>
    document
        .getElementById('form-list-create')
        .addEventListener('submit', function (event) {
            event.preventDefault();
            
            // FORM
            fetch("/enumerations/add.php", {
                method: "POST",
                body: new FormData(event.target),
            })
                // .then((response) => response.text().then((value) => console.log(value))) // FOR DEBUG
                .then((response) => response.json())
                .then((json) => {
                    document.getElementById('lists').innerHTML =
                        document.getElementById('lists').innerHTML + (
                            '<li>'
                                +'Title: '+json.list.title
                                +' / Id: '+json.list.id
                                +' / Position: '+json.list.position
                            +'</li>');
                })
                .catch((error) => {
                    console.error(error);
                });
        });
</script>

</body>
</html>
