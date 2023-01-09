<?php

namespace Controllers;

class Controller
{
    /**
     * Chemin du dossier des vues à partir de la racine
     */
    const VIEW_PATH = 'Views'; // Relative path

    /**
     * Page de redirection si non connecté
     */
    const REDIRECT_GUEST = 'login.php';

    /**
     * Page de redirection si connecté
     */
    const REDIRECT_AUTH = 'home.php';

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        // Globally start the session if use a Controller.
        session();
    }

    /**
     * Import le fichier PHP d'une vue
     *
     * @param string $fileName
     * @param array $data Contient les données fournies par le contrôleur
     * @return null|void
     */
    protected function view(string $fileName, array $data = [])
    {
        $filePath = base_path(self::VIEW_PATH.'/'.$fileName);

        if (file_exists($filePath)) {
            ob_start();
            foreach ($data as $var => $value) {
                $$var = $value;
            }
            require $filePath; // Importe/Charge le code php de la vue
            ob_end_flush();
        }
    }

    /**
     * Redirige la requête HTTP utilisateur si l'utilisateur n'est pas connecté
     *
     * @return null|void
     */
    protected function redirectIfNotAuthenticated()
    {
        if (!isAuth()) {
            return redirect(self::REDIRECT_GUEST);
        }
    }

    /**
     * Redirige la requête HTTP utilisateur si l'utilisateur est déjà connecté
     *
     * @return null|void
     */
    protected function redirectIfAuthenticated()
    {
        if (isAuth()) {
            return redirect(self::REDIRECT_AUTH);
        }
    }

    /**
     * @return int|string|null
     */
    protected static function getCurrentUserId()
    {
        return session('id');
    }
}
