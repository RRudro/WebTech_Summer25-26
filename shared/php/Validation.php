<?php
/**
 * Server side credential validation shared by the Final Term labs.
 */

/**
 * Validate a username/password pair.
 *
 * @return array{valid: bool, message: string}
 */
function validate_credentials($username, $password, $minLength = 5)
{
    $messages = [];

    if (empty($username) || strlen($username) < $minLength) {
        $messages[] = "User Name Must be at least " . $minLength . " Char";
    }
    if (empty($password) || strlen($password) < $minLength) {
        $messages[] = "Password Must be at least " . $minLength . " Char";
    }

    return [
        'valid' => empty($messages),
        'message' => implode(" ", $messages),
    ];
}

/**
 * Read a trimmed POST field.
 */
function posted_value($field)
{
    return trim($_POST[$field] ?? "");
}

/**
 * True when the given checkbox field was submitted with value "1".
 */
function posted_checkbox($field)
{
    return isset($_POST[$field]) && $_POST[$field] === "1";
}
