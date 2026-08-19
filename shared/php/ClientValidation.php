<?php
/**
 * Inlines shared/js/form-validation.js into a page.
 *
 * The script is embedded instead of linked with a <script src> so a lab folder
 * keeps working wherever it is placed inside the web server document root.
 */
function render_client_validation_script()
{
    $script = file_get_contents(__DIR__ . '/../js/form-validation.js');
    echo "<script>\n" . $script . "</script>\n";
}
