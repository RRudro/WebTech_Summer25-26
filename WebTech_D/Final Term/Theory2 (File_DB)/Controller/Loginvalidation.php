<?php
require_once __DIR__ . '/../../../../shared/php/Validation.php';
require_once __DIR__ . '/../../../../shared/php/SessionAuth.php';
require_once __DIR__ . '/../../../../shared/php/JsonUserStore.php';

start_session_once();

$jsonfile = __DIR__ . '/../Model/user.json';
$name = remembered_username();
$password = "";
$message = "";
$remember = $name !== "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = posted_value("name");
    $password = posted_value("password");
    $remember = posted_checkbox("remember");

    $validation = validate_credentials($name, $password);
    $message = $validation["message"];

    if ($validation["valid"]) {
        create_login_session($name);
        apply_remember_cookie($name, $remember);
        append_user($jsonfile, $name, $password);
        $message = "Session Created";
    }
}
?>
