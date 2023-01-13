<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
    <meta name="description" content="???">
    <meta name="author" content="Chris Balla & Stéphane Muller">
    <title>Calista | Mon espace de travail</title>
    <link rel="icon" type="image/x-icon" href="assets/pictures/favicon.svg">

    <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <?php require view_path('components/nav.php'); ?>
    </header>

    <main>
        <h4>HOME</h4>

        <?php foreach ($boards as $board) : ?>
            <a href="<?php echo '/boards/show.php?id=' . $board['id'] ?>"><?php echo $board['name_board'] ?></a>
            <br>
        <?php endforeach; ?>

        <!-- ~~~~~~~~~~ TEST FORM ~~~~~~~~~~ -->

        <form class="mt-4" method="post" action="/boards/add.php">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nameboard" id="nameboard" placeholder="Nom du tableau" required>
                <label for="nameboard">Nom du tableau</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="color" id="color" placeholder="Couleur">
                <label for="color">Couleur</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-orange fw-bold" type="submit">Confirmer</button>
            </div>
        </form>

    </main>

    <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/javascript/javascript.js"></script>

</body>

</html>