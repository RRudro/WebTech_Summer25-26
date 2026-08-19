# shared/

Utilities shared by the latest Final Term lab of every section
(`WebTech_D`, `WebTech_J`, `WebTech_T`), so the login/registration logic exists
once instead of once per section.

| File | Purpose |
| --- | --- |
| `php/Validation.php` | `validate_credentials()`, `posted_value()`, `posted_checkbox()` |
| `php/SessionAuth.php` | `start_session_once()`, `remembered_username()`, `create_login_session()`, `apply_remember_cookie()` |
| `php/JsonUserStore.php` | `read_users()`, `append_user()` — JSON file user storage |
| `php/FileUpload.php` | `store_uploaded_file()` |
| `php/Db.php` | `SharedDb` — mysqli connect / `signup()` / `signin()` |
| `php/ClientValidation.php` | `render_client_validation_script()` — inlines `js/form-validation.js` |
| `js/form-validation.js` | `collect_data(nameId, passwordId, minLength)` client side check |

A lab includes what it needs with a path relative to its own directory, e.g.
from `WebTech_T/Final Term/Theory3 (DB_FILE)/Controller/`:

```php
require_once __DIR__ . '/../../../../shared/php/Validation.php';
```

Per-section settings stay in the lab: each `Model/db.php` extends `SharedDb`
and only sets its own database name.

Earlier lab folders are deliberately left untouched — they are step-by-step
snapshots of a lecture and are meant to be read as self-contained examples.
