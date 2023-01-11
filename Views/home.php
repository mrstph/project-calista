<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>
<body>
    <header>
        <?php require view_path('components/menu.php'); ?>
    </header>

    <main>
        <h4>HOME</h4>

        <?php foreach ($boards as $board): ?>
            <a href="<?php echo '/boards/show.php?id='.$board['id'] ?>"><?php echo $board['title'] ?></a>
            <br>
        <?php endforeach; ?>
    </main>

    <?php require view_path('components/footer.php'); ?>
    </body>
</html>
