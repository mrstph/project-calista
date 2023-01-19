<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- ~~~~~~~~~~ description to write ~~~~~~~~~~ -->
  <meta name="description" content="???">
  <meta name="author" content="Chris Balla & Stéphane Muller">
  <title>Calista | Connexion</title>
  <link rel="icon" type="image/x-icon" href="/assets/pictures/favicon.svg">

  <!-- ~~~~~~~~~~ CSS ~~~~~~~~~~ -->

  <link rel="stylesheet" href="/assets/css/bootstrap.css">
  <link rel="stylesheet" href="/assets/css/custom-style-login.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

  <script src="/assets/tarteaucitron.js-1.9.9/tarteaucitron.js"></script>

  <script type="text/javascript">
    tarteaucitron.init({
      "privacyUrl": "",
      /* Privacy policy url */
      "bodyPosition": "bottom",
      /* or top to bring it as first element for accessibility */

      "hashtag": "#tarteaucitron",
      /* Open the panel with this hashtag */
      "cookieName": "tarteaucitron",
      /* Cookie name */

      "orientation": "middle",
      /* Banner position (top - bottom) */

      "groupServices": false,
      /* Group services by category */
      "serviceDefaultState": "wait",
      /* Default state (true - wait - false) */

      "showAlertSmall": false,
      /* Show the small banner on bottom right */
      "cookieslist": false,
      /* Show the cookie list */

      "closePopup": false,
      /* Show a close X on the banner */

      "showIcon": true,
      /* Show cookie icon to manage cookies */
      //"iconSrc": "", /* Optionnal: URL or base64 encoded image */
      "iconPosition": "BottomRight",
      /* BottomRight, BottomLeft, TopRight and TopLeft */

      "adblocker": false,
      /* Show a Warning if an adblocker is detected */

      "DenyAllCta": true,
      /* Show the deny all button */
      "AcceptAllCta": true,
      /* Show the accept all button when highPrivacy on */
      "highPrivacy": true,
      /* HIGHLY RECOMMANDED Disable auto consent */

      "handleBrowserDNTRequest": false,
      /* If Do Not Track == 1, disallow all */

      "removeCredit": false,
      /* Remove credit link */
      "moreInfoLink": true,
      /* Show more info link */

      "useExternalCss": false,
      /* If false, the tarteaucitron.css file will be loaded */
      "useExternalJs": false,
      /* If false, the tarteaucitron.js file will be loaded */

      //"cookieDomain": ".my-multisite-domaine.fr", /* Shared cookie for multisite */

      "readmoreLink": "",
      /* Change the default readmore link */

      "mandatory": true,
      /* Show a message about mandatory cookies */
      "mandatoryCta": true /* Show the disabled accept button when mandatory on */
    });
  </script>
</head>

<body>

  <main>

    <!-- ~~~~~~~~~~ CONNECTION FORM ~~~~~~~~~~ -->

    <div class="container">
      <div id="form-height" class="row align-items-center">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto align-items-center justify-content-center">
          <div class="card-body text-center p-4 p-sm-5">
            <h1><img id="logo-calista" src="/assets/pictures/calista-logo.svg" alt="Calista, application Trello like"></h1>

            <!-- ~~~~ SHOW MESSAGE IF SET ~~~ -->
            <?php require view_path('components/message.php'); ?>

            <form class="mt-4" method="post" action="login.php">
              <div class="form-floating mb-3">
                <input type="email" class="form-control valid-input" name="mail" id="mail" placeholder="Adresse e-mail" required>
                <label for="mail">Adresse e-mail</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Mot de passe" required>
                <label for="password">Mot de passe</label>
                <i class="far fa-eye" id="togglePassword"></i>
              </div>
              <div class="d-grid">
                <button class="btn btn-orange fw-bold" type="submit">Se connecter</button>
              </div>
              <div class="text-center my-4">
                <a href="register.php" class="link-account-form">Créer un compte</a>
              </div>
              <div class="text-center my-4">
                <a href="#" class="link-account-form">Mot de passe oublié</a>
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