<?php
/**
 * JSON file backed user store shared by the Final Term labs.
 */

/**
 * All users currently stored in the JSON file.
 */
function read_users($jsonFile)
{
    if (!file_exists($jsonFile)) {
        return [];
    }

    return json_decode(file_get_contents($jsonFile), true) ?? [];
}

/**
 * Append a user with a hashed password to the JSON file.
 */
function append_user($jsonFile, $username, $password)
{
    $users = read_users($jsonFile);
    $users[] = [
        'username' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'timestamp' => time(),
    ];

    return file_put_contents($jsonFile, json_encode($users, JSON_PRETTY_PRINT)) !== false;
}
