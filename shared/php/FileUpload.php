<?php
/**
 * Upload helper shared by the Final Term labs.
 */

/**
 * Move an uploaded file into $uploadDirectory and return its stored path,
 * or "" when nothing was uploaded.
 */
function store_uploaded_file($file, $uploadDirectory)
{
    if (empty($file["name"]) || empty($file["tmp_name"])) {
        return "";
    }

    $path = rtrim($uploadDirectory, "/") . "/" . basename($file["name"]);
    if (!move_uploaded_file($file["tmp_name"], $path)) {
        return "";
    }

    return $path;
}
