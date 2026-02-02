# Yummilicious SSP2 – Local Setup (XAMPP + VS Code)

Follow these steps to run the project locally.

---

## Prerequisites

- **XAMPP** with Apache and MySQL running
- **PHP** 8.2+ (included with XAMPP)
- **Composer** installed
- **Node.js** and **npm** (for Vite assets)
- **VS Code** (or any editor)

---

## Step 1: Environment and dependencies

1. **Copy environment file**
   ```bash
   copy .env.example .env
   ```
   (On macOS/Linux: `cp .env.example .env`)

2. **Configure database in `.env`**
   - Set `DB_CONNECTION=mysql`
   - Set `DB_DATABASE=yummilicious_ssp2`
   - Set `DB_USERNAME=root` and `DB_PASSWORD=` (default XAMPP)

3. **Generate application key**
   ```bash
   php artisan key:generate
   ```

4. **Install PHP dependencies**
   ```bash
   composer install
   ```

5. **Install frontend dependencies and build assets**
   ```bash
   npm install
   npm run build
   ```

---

## Step 2: Database

1. **Create the MySQL database**
   - Open **phpMyAdmin**: http://localhost/phpmyadmin  
   - Create a new database named: **yummilicious_ssp2**  
   - Or run in MySQL:
     ```sql
     CREATE DATABASE yummilicious_ssp2;
     ```

2. **Run migrations**
   ```bash
   php artisan migrate
   ```

3. **Seed the database (sample products)**
   ```bash
   php artisan db:seed
   ```
   This creates a test user and 6 sample products (cakes, cookies, pastries).

---

## Step 3: Storage link (for product images)

Create the symbolic link so uploaded images are served correctly:

```bash
php artisan storage:link
```

---

## Step 4: Run the server

From the project root:

```bash
php artisan serve
```

You should see something like:

```
INFO  Server running on [http://127.0.0.1:8000]
```

---

## Step 5: Open in the browser

- **Homepage:** http://127.0.0.1:8000  
- **Products:** http://127.0.0.1:8000/products  
- **About Us:** http://127.0.0.1:8000/about  
- **Testimonials:** http://127.0.0.1:8000/testimonials  
- **Contact:** http://127.0.0.1:8000/contact  
- **Login:** http://127.0.0.1:8000/login  
- **Register:** http://127.0.0.1:8000/register  

**Test user (after seeding):**
- Email: `test@example.com`  
- Password: `password`

**Livewire cart:** Use “Add to Cart” on the homepage or Products page; the cart icon in the nav updates instantly without a full page reload.

---

## API endpoints

- **Public – all products (menu):**  
  `GET http://127.0.0.1:8000/api/menu`

- **Protected – user orders (requires login / Sanctum token):**  
  `GET http://127.0.0.1:8000/api/user/orders`

---

## Optional: Development assets (Vite)

For live reload during frontend work:

```bash
npm run dev
```

Keep this running in a separate terminal while using `php artisan serve`.

---

## Security Documentation

A **Security Documentation** file is provided for your assignment:

- **Location:** `docs/SECURITY_DOCUMENTATION.md`  
- **Content:** Jetstream authentication, Sanctum API protection, CSRF/XSS mitigation, and a threat-vs-countermeasure table.  
- **Export to PDF or Word:** Open `docs/SECURITY_DOCUMENTATION.md` in Microsoft Word (or another editor that supports Markdown), then use **Save As** to export as PDF or `.docx`.

---

## Summary checklist

- [ ] `.env` created and `APP_KEY` generated  
- [ ] MySQL database `yummilicious_ssp2` created  
- [ ] `composer install` and `npm install` + `npm run build`  
- [ ] `php artisan migrate`  
- [ ] `php artisan db:seed`  
- [ ] `php artisan storage:link`  
- [ ] `php artisan serve`  
- [ ] Open http://127.0.0.1:8000 in the browser  

After this, the app is ready to use locally with XAMPP and VS Code.
