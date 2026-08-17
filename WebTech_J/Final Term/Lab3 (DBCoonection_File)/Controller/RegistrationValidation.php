<?php
require_once __DIR__ . '/../../../../shared/php/Validation.php';
require_once __DIR__ . '/../../../../shared/php/SessionAuth.php';
require_once __DIR__ . '/../../../../shared/php/JsonUserStore.php';
require_once __DIR__ . '/../../../../shared/php/FileUpload.php';
include __DIR__ . '/../Model/db.php';

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
        apply_remember_cookie($name, $remember, 7);
        append_user($jsonfile, $name, $password);
        $path = store_uploaded_file($_FILES["file"] ?? [], __DIR__ . '/../Uploads');

        $database = new db();
        $connection = $database->connection();
        $result = $database->signup($connection, "users", $name, $password, $path);
        if ($result) {
            Header("Location:../View/login.php");
        } else {
            $message = "Please try again";
        }
    }
}
?>
