<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container gap-3">
        <a class="navbar-brand" href="/index.php"><img id="logo-nav" src="/assets/pictures/calista-logo-white.svg" alt="Calista, application Trello like"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a id="dashboard-nav" class="nav-link" href="/home.php">Mon espace de travail
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a id="boards-nav" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Mes tableaux</a>
                    <div class="dropdown-menu">
                        <?php foreach ($userboards as $userboard) : ?>
                            <a class="dropdown-item" href="<?php echo '/boards/show.php?id=' . $userboard['id'] ?>"><?php echo $userboard['name_board'] ?></a>
                        <?php endforeach; ?>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav gap-2">
                <li class="nav-item">
                    <a class="nav-link" id="help-icon-nav" href="">Guide de Calista
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <img id="profile-icon-nav" src="/assets/pictures/profile-picture.svg" alt="Menu de profil">
                        <span id="nav-profile-name">
                            <?php
                            echo ($user->getFullName());
                            ?>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="#">Profil</a>
                        <div class="dropdown-divider"></div>
                        <!-- <form action="logout.php" method="POST"><a class="dropdown-item"><input class="btn" type="submit" value="Se déconnecter"></a></form> -->
                        <a href="/logout.php" class="dropdown-item">Se déconnecter</a>

                        <!-- <a class="dropdown-item" href="logout.php">Se déconnecter</a> -->
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>