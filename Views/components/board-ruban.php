<div class="navbar navbar-expand-lg navbar-white">
    <div class="container">
        <h1 class="navbar-brand"><?php echo ($board->name_board); ?><h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modify-board">
                        Modifier
                    </button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-board">
                        Supprimer
                    </button>

                    <!-- <form method="POST" action="/boards/delete.php">
                        <input type="text" name="id" id="id_board" value="<?php // echo $board->id; ?>" hidden>
                        <input type="submit" value="Supprimer un tableau">
                    </form> -->
                </li>
            </ul>   
        </div>
    </div>
</div>