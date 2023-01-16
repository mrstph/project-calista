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

    <!-- ~~~~ THEME CSS FILE  ~~~~ -->
    
    <?php if($user->color_user_app === "blue"){
            echo('<link rel="stylesheet" href="/assets/css/root-blue-theme.css">');
        } else if($user->color_user_app === "red") {
            echo('<link rel="stylesheet" href="/assets/css/root-red-theme.css">');
        } else if($user->color_user_app === "orange"){
            echo('<link rel="stylesheet" href="/assets/css/root-orange-theme.css">');
        } else {
            echo('<link rel="stylesheet" href="/assets/css/root-blue-theme.css">');
        }
    ?>

    <link rel="stylesheet" href="assets/css/custom-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>
    <header>
        <?php require view_path('components/nav.php'); ?>
    </header>

    <main>
        <div class="container">

            <!-- ~~~~ SHOW MESSAGE IF SET ~~~ -->
            
            <?php require view_path('components/message.php'); ?>

            <!-- ~~~~~~~~~~ SHOW BOARDS FOR USER ~~~~~~~~~~ -->

            <div class="d-md-flex flex-md-wrap flex-xl-row gap-3 my-5">
                <?php foreach ($userboards as $userboard) : ?>
                    <div class="card border-primary mb-3" style="min-width: 20rem">
                        <div class="card-body">
                            <h4 class="card-title"><a href="<?php echo '/boards/show.php?id=' . $userboard['id'] ?>"><?php echo $userboard['name_board'] ?></a></h4>
                        </div>
                    </div>
                    <br>
                <?php endforeach; ?>
            </div>

            <!-- ~~~~~~~~~~ BUTTON FOR ADDING NEW BOARD ~~~~~~~~~~ -->

            <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#create-board">
                    Créer un tableau
            </button>

        </div>

    </main>

    <!-- ~~~~~~~~~~ CREATE BOARD MODAL ~~~~~~~~~~ -->

    <div class="modal fade" id="create-board" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title fs-5" id="exampleModalLabel">Créer un tableau</h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form-create-board" method="post" action="/boards/add.php">
                        <input class="mb-2 form-control" type="text" name="nameboard" id="nameboard" placeholder="Nom du tableau" required>
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
                    <input type="submit" form="form-create-board" class="btn btn-primary" value="Créer" data-bs-dismiss="modal">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let myModal = document.getElementById('create-board');
        let myInput = document.getElementById('nameboard');

        //when modal is shown, put the focus on the input field
        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus();
        });
        //when modal is hidden, reset the value of the input field
        myModal.addEventListener('hidden.bs.modal', () => {
            myInput.value = "";
        });
    </script>

</body>

</html>