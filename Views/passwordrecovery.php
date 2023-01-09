<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
  <meta name="description" content="???">
  <meta name="author" content="Chris Balla & Stéphane Muller">
  <title>Calista | Changement de mot de passe</title>
  <link rel="icon" type="image/x-icon" href="assets/pictures/favicon.svg">

  <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/custom-style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body>

  <main>

    <!-- ~~~~~~~~~~ PASSWORD RECOVERY FORM ~~~~~~~~~~ -->

    <div class="container">
      <div id="form-height" class="row align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto align-items-center justify-content-center">
          <div class="card-body text-center p-4 p-sm-5">
            <h1><img id="logo-calista" src="assets/pictures/calista-logo.svg" alt="Calista, application Trello like"></h1>
            <form class="mt-4" method="post" action="">
              <!-- <div class="form-floating mb-3">
                <input type="text" class="form-control" name="code" id="code" placeholder="Code" required>
                <label for="code">Code reçu par e-mail</label>
              </div> -->
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Nouveau mot de passe" required>
                <label for="password">Nouveau mot de passe</label>
                <i class="far fa-eye" id="togglePassword"></i>
              </div>
              <div class="d-grid">
                <button class="btn btn-orange fw-bold" type="submit">Mettre à jour le mot de passe</button>
              </div>
              <div class="text-center my-4">
                <a href="login.php" class="link-account-form">Se connecter</a>
              </div>
              <div class="text-center my-4">
                <a href="register.php" class="link-account-form">Créer un compte</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

  </main>

  <!-- ~~~~~~~~~~ FOOTER ~~~~~~~~~~ -->

  <footer>
    <div class="container">
      <!-- <div class="d-flex col-md-4 mx-auto justify-content-md-between text-center mb-4"> -->
      <div class="row col-sm-9 col-lg-5 mx-auto text-center mb-4">
        <a href="#" class="col-sm-12 col-lg-6 mb-3">Mentions légales</a>
        <a href="#" class="col-sm-12 col-lg-6">Politique de confidentialité</a>
      </div>
      <div class="text-center">
        <!-- <div class="col-sm-9 col-md-7 col-lg-5 mx-auto text-center"> -->
        <p>&#169; 2023 Calista - Tous droits réservés.</p>
      </div>
  </footer>

  <!-- ~~~~~~~~~~ JAVASCRIPT ~~~~~~~~~~ -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/javascript/javascript.js"></script>

</body>

</html>