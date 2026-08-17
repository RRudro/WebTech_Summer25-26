/**
 * Client side credential validation shared by the Final Term login and
 * registration pages.
 *
 * Usage: <form onsubmit="return collect_data('name', 'password')">
 */
function collect_data(nameId, passwordId, minLength) {
    nameId = nameId || "name";
    passwordId = passwordId || "password";
    minLength = minLength || 5;

    var name = document.getElementById(nameId).value.trim();
    var password = document.getElementById(passwordId).value.trim();
    var messages = [];

    if (name.length < minLength) {
        messages.push("User Name Must be " + minLength + " Char");
    }
    if (password.length < minLength) {
        messages.push("Password Must be " + minLength + " Char");
    }

    if (messages.length > 0) {
        alert(messages.join(" "));
        return false;
    }

    return true;
}
