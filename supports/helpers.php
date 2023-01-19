<?php

/*
 * Helpers functions
 */

if (!function_exists('base_path')) {
    /**
     * Get the absolute base app path folder.
     *
     * @return string
     */
    function base_path($string = ''): string
    {
        // Add a slash in string begin
        if ($string and substr($string, 0, 1) !== '/') {
            $string = '/'.$string;
        }

        return APP_BASE_PATH.$string;
    }
}

if (!function_exists('view_path')) {
    /**
     * Get the absolute view path folder.
     *
     * @return string
     */
    function view_path($string = ''): string
    {
        // Add a slash in string begin
        if ($string and substr($string, 0, 1) !== '/') {
            $string = '/'.$string;
        }

        return base_path(\Controllers\Controller::VIEW_PATH.$string);
    }
}

if (!function_exists('session')) {
    /**
     * Method for manipulate the session array.
     * Start session if necessary.
     *
     * Get session array ($_SESSION) if key is null.
     * Get session value by a key ($_SESSION[key]) if key is definied.
     * Set session key-value ($_SESSION[key] = value) if key and value are defined.
     *
     * @return array|int|string|bool|null
     */
    function session(?string $key = null, $value = null)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        if ($key and !is_null($value)) {
            // Set key-value in session array
            $_SESSION[$key] = $value;
            return true; // Set is ok
        } elseif ($key) {
            // Get a specific session value
            return $_SESSION[$key] ?? null;
        }

        return $_SESSION;
    }
}

if (!function_exists('messages')) {
    /**
     * Method for manipulate the messages array in session array.
     *
     * Get messages array ($_SESSION[’messages']) if value is null.
     * Set message value ($_SESSION[’messages'][] = value) if value are defined.
     *
     * @return array|bool
     */
    function messages($value = null)
    {
        $messages = session('messages') ?? [];

        if ($value) {
            // Set key-value in messages array
            $messages[] = $value; // Set key-value in messages
            session('messages', $messages); // Update message in session array
            return true; // Set is ok
        }

        // Return messages array
        return $messages;
    }
}

if (!function_exists('isAuth')) {
    /**
     * Check if the user is authenticated.
     *
     * @return bool
     */
    function isAuth(): bool
    {
        return !empty(session('id'));
    }
}

if (!function_exists('redirect')) {
    /**
     * Return a redirect response to request client.
     * Stop the application.
     *
     * @param string $url
     * @param int $statusCode
     * @return null|void
     */
    function redirect(string $url, int $statusCode = 200)
    {
        http_response_code($statusCode);
        header('Location: '.$url);
        exit();
    }
}

if (!function_exists('dump')) {
    /**
     * Display the params with a custom "var_dump".
     *
     * @param mixed ...$params
     */
    function dump(...$params)
    {
        foreach ($params as $param) {
            echo '<pre>';
            var_dump($param);
            echo '</pre>';
        }
    }
}

if (!function_exists('dd')) {
    /**
     * Display the params with dump() helper.
     * Stop the application.
     *
     * @param mixed ...$params
     */
    function dd(...$params)
    {
        foreach ($params as $param) {
            dump($param);
        }

        exit();
    }
}
