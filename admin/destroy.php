<?php
// Initialize the session.
session_start();
// Unset all of the session variables.
$_SESSION = array();
// lukke sessionen, og slette session cookie.
// Bemærk: Dette vil ødelægge sessionen, og ikke kun data session!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
// Endelig lukkede session
session_destroy();
header('Location: ../');
?>