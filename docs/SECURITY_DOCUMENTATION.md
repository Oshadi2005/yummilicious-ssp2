# Yummilicious SSP2 – Security Documentation

This document describes the authentication, API protection, and security measures used in the Yummilicious Laravel 12 project. It is intended for export to PDF or Word (e.g. open in Microsoft Word and Save As PDF).

---

## 1. Laravel Jetstream Authentication

**What it provides**

- **Login / Register / Password reset**  
  Jetstream (with Livewire) provides ready-made pages and flows for user registration, login, logout, email verification, and password reset. All use Laravel’s built-in security features.

- **Session-based web auth**  
  Logged-in users are identified by a server-side session. The session ID is stored in a cookie (typically `laravel_session`) that is:
  - **HttpOnly** (not readable by JavaScript), reducing XSS-based session theft.
  - **SameSite** (e.g. `lax`) to limit CSRF from other sites.
  - Configurable as **Secure** in production (HTTPS only).

- **Password hashing**  
  Passwords are never stored in plain text. Laravel uses **bcrypt** (via the `Hash` facade) with a cost factor (e.g. 12). Jetstream’s registration and password-update flows use this by default.

- **Protected routes**  
  Routes for creating, editing, and deleting products are wrapped in `auth` middleware (and, if enabled, `verified`). Only authenticated users can access them.

**In this project**

- Web UI: login, register, dashboard, and product CRUD (create/edit/delete) are protected by Jetstream + session auth.
- Product listing and homepage are public; cart is session-based and does not require login.

---

## 2. Laravel Sanctum – API Protection

**What it provides**

- **Token-based API auth**  
  Sanctum issues **API tokens** (e.g. for mobile apps or external clients). Clients send `Authorization: Bearer <token>`; Laravel validates the token and associates the request with a user.

- **Scope / abilities**  
  Tokens can be limited to certain abilities (e.g. read-only). The project can be extended to use these for fine-grained API access.

**In this project**

- **Public API:** `GET /api/menu` returns all products. No auth required.
- **Protected API:** `GET /api/user/orders` (and similar) use `auth:sanctum` middleware. Only requests with a valid session cookie (from the same app) or a valid Bearer token are allowed. Unauthenticated callers receive 401.

**Best practices**

- Issue tokens only after login (e.g. from a “Create API token” screen in the dashboard).
- Store tokens securely on the client; do not expose them in front-end code or logs.
- Use HTTPS in production so tokens are not sent over plain HTTP.

---

## 3. CSRF Protection

**Threat**

- **Cross-Site Request Forgery (CSRF):** A malicious site tricks the user’s browser into sending a request to your app (e.g. form submit or state-changing request) using the user’s cookies. Without protection, the app would treat it as a legitimate request.

**Laravel’s countermeasure**

- **CSRF token**  
  Laravel generates a per-session token and expects it on state-changing requests (POST, PUT, PATCH, DELETE). Blade’s `@csrf` directive and the Axios/fetch setup (when using the default `VerifyCsrfToken` middleware) send this token.

- **Verification**  
  The `VerifyCsrfToken` middleware compares the token in the request (header or body) with the one in the session. If they don’t match, the request is rejected with 419.

**In this project**

- All forms (login, register, product create/edit/delete) include `@csrf`.
- Livewire requests use the same CSRF mechanism via the framework’s default configuration.
- API routes that use Sanctum tokens are typically exempt from CSRF (token-based requests are not cookie-based in the same way).

---

## 4. XSS (Cross-Site Scripting) Protection

**Threat**

- **XSS:** Attacker injects script (e.g. in a product name or description). If the app outputs that data without escaping, the script runs in other users’ browsers and can steal cookies, alter content, or perform actions as the user.

**Laravel’s countermeasure**

- **Blade escaping**  
  Blade’s `{{ $variable }}` syntax automatically escapes HTML. So `{{ $product->name }}` and `{{ $product->description }}` are safe for HTML context. Only use `{!! !!}` when you intentionally output trusted HTML.

- **Content Security**  
  Validate and sanitize input (e.g. product name, description) in controllers. The project uses Laravel’s validation (e.g. `max:255`, `string`) to limit and type-check input.

**In this project**

- All user-supplied data displayed in Blade views is output with `{{ }}` unless explicitly marked as safe.
- Validation in `ProductController` (store/update) limits length and type; file uploads are validated (type, size).

---

## 5. SQL Injection Prevention

**Threat**

- **SQL injection:** Attacker sends crafted input that is concatenated into SQL, changing the query (e.g. reading or deleting data).

**Laravel’s countermeasure**

- **Eloquent ORM and query builder**  
  All database access uses parameterized queries. User input is never concatenated into raw SQL. For example, `Product::find($id)`, `Product::where('category', $category)->get()`, and `$product->update($validated)` are safe when `$id`, `$category`, and `$validated` come from request/validation.

**In this project**

- Product CRUD and API use Eloquent and validated request data; no raw SQL with user input.

---

## 6. File Upload Security

**Threat**

- Malicious or oversized files, or wrong file types, can lead to denial of service, path traversal, or execution of scripts if stored in a web-accessible directory.

**Laravel’s countermeasure**

- **Validation**  
  The project validates uploads: type (e.g. `image`), mimes (e.g. `jpeg,png,jpg,gif,webp`), and max size (e.g. 2MB). Only validated data is used.

- **Storage**  
  Uploads are stored under `storage/app/public` (e.g. `products/...`) and served via the public `storage` link. Filenames are generated by Laravel (e.g. `store('products', 'public')`), avoiding user-controlled paths.

**In this project**

- Product image uploads are validated in `ProductController@store` and `@update`; stored under `storage/app/public/products` with framework-generated names.

---

## 7. Threat vs Countermeasure Summary

| Threat / Risk              | Laravel / Yummilicious countermeasure                          |
|---------------------------|-----------------------------------------------------------------|
| Unauthorized access       | Jetstream auth; `auth` middleware on create/edit/delete routes |
| Weak passwords            | Bcrypt hashing; optional strength rules in Jetstream           |
| Session hijacking         | HttpOnly, SameSite cookies; secure session config               |
| CSRF                      | `@csrf` and `VerifyCsrfToken` middleware                        |
| XSS                       | Blade `{{ }}` escaping; validation of input                     |
| SQL injection             | Eloquent/query builder; no raw SQL with user input              |
| Unprotected API           | Sanctum `auth:sanctum` on `/api/user/orders`                    |
| Dangerous file uploads   | Validation (type, size); safe storage and naming                |

---

## 8. Recommendations for Production

- Use **HTTPS** and set `SESSION_SECURE_COOKIE=true` (and related env).
- Set **strong `APP_KEY`** and keep it secret.
- Use a **dedicated database user** with minimal privileges.
- Enable **email verification** if required (Jetstream supports it).
- **Rate limit** login and API endpoints (Laravel’s throttle middleware).
- Keep Laravel, Jetstream, Sanctum, and Livewire **updated** for security fixes.
- **Log** authentication failures and sensitive actions; monitor for abuse.

---

*This Security Documentation covers Jetstream authentication, Sanctum API protection, CSRF/XSS mitigation, and mapping of common threats to Laravel countermeasures in the Yummilicious SSP2 project. Export this file to PDF or Word for submission or distribution.*
