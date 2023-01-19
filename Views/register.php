<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
  <meta name="description" content="???">
  <meta name="author" content="Chris Balla & Stéphane Muller">
  <title>Calista | Inscription</title>
  <link rel="icon" type="image/x-icon" href="assets/pictures/favicon.svg">

  <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/custom-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>

  <main>

    <!-- ~~~~~~~~~~ REGISTER FORM ~~~~~~~~~~ -->

    <div class="container">
      <div id="form-height" class="row align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto align-items-center justify-content-center">
          <div class="card-body text-center p-4 p-sm-5">
            <h1><img id="logo-calista" src="assets/pictures/calista-logo.svg" alt="Calista, application Trello like"></h1>

            <!-- ~~~~ SHOW MESSAGE IF SET ~~~ -->
            <?php require view_path('components/message.php'); ?>

            <form class="mt-4" method="post" action="register.php">
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Nom" required>
                <label for="lastname">Nom</label>
              </div>
              <div class="form-floating mb-3">
                <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Prénom" required>
                <label for="firstname">Prénom</label>
              </div>
              <div class="form-floating mb-3">
                <input type="email" class="form-control valid-input" name="mail" id="mail" placeholder="Adresse e-mail" required>
                <label for="mail">Adresse e-mail</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                <label for="password">Mot de passe</label>
                <i class="far fa-eye" id="togglePassword"></i>
              </div>
              <p id="text-obligation">Pour une sécurité optimale de votre mot de passe, celui-ci doit être composé de 8 caractères minimum comprenant au moins une minuscule, une majuscule, un chiffre (0-9) et un caractère spécial.</p>
              <div class="d-grid">
                <button class="btn btn-orange fw-bold" type="submit">Créer un compte</button>
              </div>
              <div class="text-center my-4">
                <a href="login.php" class="link-account-form">Se connecter</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- ~~~~~~~~~~ FOOTER ~~~~~~~~~~ -->

  <?php require view_path('components/footer.php'); ?>

  <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/javascript/javascript.js"></script>

</body>

</html>