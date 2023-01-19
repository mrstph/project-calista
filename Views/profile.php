<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
    <meta name="description" content="???">
    <meta name="author" content="Chris Balla & Stéphane Muller">
    <title>Calista | Profil de <?php echo ($user->getFullName()); ?></title>
    <link rel="icon" type="image/x-icon" href="/assets/pictures/favicon.svg">

    <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

    <link rel="stylesheet" href="/assets/css/bootstrap.css">

    <!-- ~~~~ THEME CSS FILE  ~~~~ -->
    <link rel="stylesheet" href="/assets/css/root-<?php echo $user->color_user_app; ?>-theme.css">

    <link rel="stylesheet" href="/assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <?php require view_path('/components/nav.php'); ?>
    </header>

    <main>
        <div class="container">

            <!-- ~~~~ SHOW MESSAGE IF SET ~~~ -->

            <?php require view_path('/components/message.php'); ?>

            <!-- ~~~~~~~~~~ UPDATE USER FORM ~~~~~~~~~~ -->


        </div>

    </main>

    <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>