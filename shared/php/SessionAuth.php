<?php
/**
 * Session and "Remember Me" cookie helpers shared by the Final Term labs.
 */

const REMEMBER_COOKIE = "remember_user";

/**
 * Start the session only when one is not already active.
 */
function start_session_once()
{
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
}

/**
 * Username stored in the "Remember Me" cookie, or "" when it is not set.
 */
function remembered_username()
{
    return $_COOKIE[REMEMBER_COOKIE] ?? "";
}

/**
 * Mark the user as logged in for the current session.
 */
function create_login_session($username)
{
    $_SESSION["logged_in"] = true;
    $_SESSION["username"] = $username;
}

/**
 * Store or clear the "Remember Me" cookie.
 */
function apply_remember_cookie($username, $remember, $days = 30)
{
    if ($remember) {
        setcookie(REMEMBER_COOKIE, $username, time() + 86400 * $days, "/");
    } else {
        setcookie(REMEMBER_COOKIE, "", time() - 3600, "/");
    }
}
