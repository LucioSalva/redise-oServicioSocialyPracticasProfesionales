---
name: php-bootstrap-master
description: "Expert-level skill for building PHP web applications with HTML, CSS, Bootstrap 5, and JavaScript. Use this skill whenever the user asks to create, modify, or work on any PHP project, web page, form, CRUD, dashboard, login system, or any web application using PHP + Bootstrap. Also trigger when the user mentions their 'Servicio Social', 'Prácticas Profesionales', or 'rediseño' project, or references the folder 'rediseñoServicioSocialyPracticasProfesionales'. This skill enforces a specific institutional color palette (Vino #691C32, Dorado #BC955C, Arena #ECD798), custom button styles, download buttons, and card components. Trigger on any mention of PHP, Bootstrap, HTML/CSS in the context of web apps, CRUD systems, dashboards, admin panels, school systems, or government-style projects."
---

# PHP + Bootstrap 5 Master Skill

You are an expert-level PHP, HTML5, CSS3, Bootstrap 5, and JavaScript developer. You produce clean, secure, production-ready code following best practices. Every output uses the institutional color palette and custom UI components defined below.

## Project Context

The project lives at: `C:\Users\lucio\Desktop\creacionSoftware\rediseñoServicioSocialyPracticasProfesionales`

This is a web application for managing Servicio Social and Prácticas Profesionales (Mexican university system). All UI must use the institutional color palette and custom components.

## Color Palette (Institutional — Mandatory)

These colors are NON-NEGOTIABLE. Every page, component, and element must use these CSS variables:

```css
:root {
  /* Primary Colors */
  --color-vino:        #691C32;
  --color-dorado:      #BC955C;
  --color-arena:       #ECD798;

  /* Derived Shades */
  --color-vino-light:  #8B2A4A;
  --color-vino-dark:   #4A1323;
  --color-dorado-light:#D4AD74;
  --color-dorado-dark: #9A7A48;
  --color-arena-light: #F2E4B5;
  --color-arena-dark:  #D4C07A;

  /* Neutrals */
  --color-white:       #FFFFFF;
  --color-light-gray:  #F8F9FA;
  --color-gray:        #6C757D;
  --color-dark:        #212529;

  /* Functional */
  --color-success:     #28A745;
  --color-danger:      #DC3545;
  --color-warning:     #FFC107;
  --color-info:        #17A2B8;

  /* Typography */
  --font-primary:      'Poppins', sans-serif;
  --font-secondary:    'Montserrat', sans-serif;
}
```

## Mandatory HTML Boilerplate

Every PHP page MUST start with this structure:

```php
<?php
session_start();
// Security & DB includes here
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Sistema de Servicio Social'; ?></title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="assets/css/styles.css" rel="stylesheet">
</head>
<body>
    <!-- Content here -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
</body>
</html>
```

## Custom UI Components

### 1. Standard Button (`.btn-custom`)

Elegant button with subtle shadow and scale animation. Available in 3 palette variants:

```css
/* Base button style */
.btn-custom {
  width: fit-content;
  min-width: 100px;
  height: 45px;
  padding: 8px 16px;
  border-radius: 5px;
  border: 2.5px solid #E0E1E4;
  box-shadow: 0px 0px 20px -20px;
  cursor: pointer;
  background-color: var(--color-white);
  color: var(--color-dark);
  transition: all 0.2s ease-in-out 0ms;
  user-select: none;
  font-family: var(--font-primary);
  font-weight: 500;
  font-size: 14px;
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  text-decoration: none;
}
.btn-custom:hover {
  box-shadow: 0px 0px 20px -18px;
}
.btn-custom:active {
  transform: scale(0.95);
}

/* Vino variant */
.btn-custom-vino {
  background-color: var(--color-vino);
  color: var(--color-white);
  border-color: var(--color-vino-dark);
}
.btn-custom-vino:hover {
  background-color: var(--color-vino-light);
  color: var(--color-white);
}

/* Dorado variant */
.btn-custom-dorado {
  background-color: var(--color-dorado);
  color: var(--color-white);
  border-color: var(--color-dorado-dark);
}
.btn-custom-dorado:hover {
  background-color: var(--color-dorado-light);
  color: var(--color-white);
}

/* Arena variant */
.btn-custom-arena {
  background-color: var(--color-arena);
  color: var(--color-dark);
  border-color: var(--color-arena-dark);
}
.btn-custom-arena:hover {
  background-color: var(--color-arena-light);
}

/* Outline variants */
.btn-custom-outline-vino {
  background-color: transparent;
  color: var(--color-vino);
  border-color: var(--color-vino);
}
.btn-custom-outline-vino:hover {
  background-color: var(--color-vino);
  color: var(--color-white);
}

.btn-custom-outline-dorado {
  background-color: transparent;
  color: var(--color-dorado-dark);
  border-color: var(--color-dorado);
}
.btn-custom-outline-dorado:hover {
  background-color: var(--color-dorado);
  color: var(--color-white);
}
```

**Usage:**
```html
<button class="btn-custom btn-custom-vino">Guardar</button>
<button class="btn-custom btn-custom-dorado">Editar</button>
<button class="btn-custom btn-custom-arena">Cancelar</button>
<a href="#" class="btn-custom btn-custom-outline-vino">Ver más</a>
```

### 2. Download Button (`.download-button`)

Animated button that reveals a download icon on hover. Uses the institutional palette:

```css
.download-button {
  position: relative;
  border-width: 0;
  color: var(--color-white);
  font-size: 15px;
  font-weight: 600;
  cursor: pointer;
  border-radius: 4px;
  z-index: 1;
  font-family: var(--font-primary);
}
.download-button .docs {
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
  min-height: 40px;
  padding: 0 10px;
  border-radius: 4px;
  z-index: 1;
  background-color: var(--color-vino);
  border: solid 1px var(--color-vino-dark);
  transition: all 0.5s cubic-bezier(0.77, 0, 0.175, 1);
}
.download-button:hover {
  box-shadow:
    rgba(105, 28, 50, 0.25) 0px 54px 55px,
    rgba(105, 28, 50, 0.12) 0px -12px 30px,
    rgba(105, 28, 50, 0.12) 0px 4px 6px,
    rgba(105, 28, 50, 0.17) 0px 12px 13px,
    rgba(105, 28, 50, 0.09) 0px -3px 5px;
}
.download-button .download {
  position: absolute;
  inset: 0;
  display: flex;
  align-items: center;
  justify-content: center;
  max-width: 90%;
  margin: 0 auto;
  z-index: -1;
  border-radius: 4px;
  transform: translateY(0%);
  background-color: var(--color-dorado);
  border: solid 1px var(--color-dorado-dark);
  transition: all 0.5s cubic-bezier(0.77, 0, 0.175, 1);
}
.download-button:hover .download {
  transform: translateY(100%);
}
.download-button .download svg polyline,
.download-button .download svg line {
  animation: docs-bounce 1s infinite;
}
@keyframes docs-bounce {
  0%   { transform: translateY(0%); }
  50%  { transform: translateY(-15%); }
  100% { transform: translateY(0%); }
}
```

**Usage:**
```html
<button class="download-button">
  <div class="docs">
    <svg viewBox="0 0 24 24" width="20" height="20" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
      <polyline points="14 2 14 8 20 8"></polyline>
      <line x1="16" y1="13" x2="8" y2="13"></line>
      <line x1="16" y1="17" x2="8" y2="17"></line>
      <polyline points="10 9 9 9 8 9"></polyline>
    </svg>
    Descargar PDF
  </div>
  <div class="download">
    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round">
      <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
      <polyline points="7 10 12 15 17 10"></polyline>
      <line x1="12" y1="15" x2="12" y2="3"></line>
    </svg>
  </div>
</button>
```

### 3. Card Component (`.card-custom`)

Clean card with colored dots header and subtle styling:

```css
.card-custom {
  background-color: var(--color-white);
  width: 100%;
  border-radius: 0.5rem;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1), 0 1px 2px rgba(0, 0, 0, 0.06);
  overflow: hidden;
  transition: box-shadow 0.3s ease, transform 0.2s ease;
  border: 1px solid rgba(0, 0, 0, 0.05);
}
.card-custom:hover {
  box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
  transform: translateY(-2px);
}
.card-custom-header {
  display: flex;
  padding: 0.5rem;
  gap: 0.25rem;
}
.card-custom-dot {
  display: inline-block;
  width: 0.75rem;
  height: 0.75rem;
  border-radius: 50%;
}
.card-custom-dot-vino   { background-color: var(--color-vino); }
.card-custom-dot-dorado { background-color: var(--color-dorado); }
.card-custom-dot-arena  { background-color: var(--color-arena); }
.card-custom-body {
  padding: 1rem 1.25rem;
}
.card-custom-title {
  font-family: var(--font-primary);
  font-weight: 600;
  font-size: 1.1rem;
  color: var(--color-vino);
  margin-bottom: 0.5rem;
}
.card-custom-text {
  font-family: var(--font-secondary);
  font-size: 0.9rem;
  color: var(--color-gray);
  line-height: 1.5;
}
.card-custom-footer {
  padding: 0.75rem 1.25rem;
  border-top: 1px solid rgba(0, 0, 0, 0.05);
  display: flex;
  justify-content: flex-end;
  gap: 0.5rem;
}
```

**Usage:**
```html
<div class="card-custom">
  <div class="card-custom-header">
    <span class="card-custom-dot card-custom-dot-vino"></span>
    <span class="card-custom-dot card-custom-dot-dorado"></span>
    <span class="card-custom-dot card-custom-dot-arena"></span>
  </div>
  <div class="card-custom-body">
    <h5 class="card-custom-title">Título de la tarjeta</h5>
    <p class="card-custom-text">Contenido descriptivo aquí.</p>
  </div>
  <div class="card-custom-footer">
    <button class="btn-custom btn-custom-vino">Acción</button>
  </div>
</div>
```

## PHP Best Practices

When writing PHP code, always follow these rules:

1. **Security first**: Use prepared statements (PDO) for ALL database queries. Never concatenate SQL.
2. **Input validation**: Sanitize all `$_GET`, `$_POST`, `$_REQUEST` with `htmlspecialchars()`, `filter_input()`, or appropriate filters.
3. **Password handling**: Use `password_hash()` and `password_verify()`. Never store plain text passwords.
4. **Session security**: Regenerate session ID on login (`session_regenerate_id(true)`). Set secure cookie parameters.
5. **CSRF protection**: Include CSRF tokens in every form.
6. **File structure**: Organize code into a clean MVC-like structure (see Project Structure below).
7. **Error handling**: Use try-catch blocks. Never expose raw errors to users. Log errors server-side.
8. **UTF-8 everywhere**: All files saved as UTF-8. Database charset `utf8mb4`.

## Project Structure

Always organize the project like this:

```
rediseñoServicioSocialyPracticasProfesionales/
├── index.php                    # Entry point / login
├── config/
│   ├── database.php             # PDO connection
│   └── config.php               # App constants & settings
├── includes/
│   ├── header.php               # Shared header with nav
│   ├── footer.php               # Shared footer
│   ├── sidebar.php              # Sidebar navigation
│   ├── auth.php                 # Authentication helpers
│   └── functions.php            # Utility functions
├── assets/
│   ├── css/
│   │   └── styles.css           # All custom CSS (palette + components)
│   ├── js/
│   │   └── main.js              # Custom JavaScript
│   └── img/                     # Images and logos
├── modules/
│   ├── dashboard/               # Dashboard module
│   ├── alumnos/                 # Student management
│   ├── proyectos/               # Project management
│   ├── reportes/                # Reports
│   └── usuarios/                # User management
└── uploads/                     # Uploaded files (outside public if possible)
```

## Bootstrap Override Rules

Override Bootstrap's default theme to use the institutional palette. Add these to `styles.css`:

```css
/* Bootstrap theme overrides */
.bg-primary   { background-color: var(--color-vino) !important; }
.bg-secondary { background-color: var(--color-dorado) !important; }
.bg-info      { background-color: var(--color-arena) !important; }
.text-primary { color: var(--color-vino) !important; }
.text-secondary { color: var(--color-dorado) !important; }
.btn-primary {
  background-color: var(--color-vino) !important;
  border-color: var(--color-vino-dark) !important;
}
.btn-primary:hover {
  background-color: var(--color-vino-light) !important;
  border-color: var(--color-vino) !important;
}
.btn-secondary {
  background-color: var(--color-dorado) !important;
  border-color: var(--color-dorado-dark) !important;
}
.btn-secondary:hover {
  background-color: var(--color-dorado-light) !important;
  border-color: var(--color-dorado) !important;
}
.btn-outline-primary {
  color: var(--color-vino) !important;
  border-color: var(--color-vino) !important;
}
.btn-outline-primary:hover {
  background-color: var(--color-vino) !important;
  color: var(--color-white) !important;
}
.navbar { background-color: var(--color-vino) !important; }
.sidebar { background-color: var(--color-vino-dark); }
.table thead { background-color: var(--color-vino); color: var(--color-white); }
.page-link { color: var(--color-vino); }
.page-item.active .page-link {
  background-color: var(--color-vino);
  border-color: var(--color-vino);
}

/* Form focus states */
.form-control:focus {
  border-color: var(--color-dorado);
  box-shadow: 0 0 0 0.2rem rgba(188, 149, 92, 0.25);
}
.form-select:focus {
  border-color: var(--color-dorado);
  box-shadow: 0 0 0 0.2rem rgba(188, 149, 92, 0.25);
}
```

## Additional Components

Read `references/components.md` for additional pre-built components including:
- Navbar with institutional branding
- Sidebar navigation
- Data tables with sorting/pagination
- Login form
- Dashboard stat cards
- Modal dialogs
- Toast notifications
- Loading spinners
- Breadcrumbs
- Badges and status indicators

## JavaScript Patterns

Read `references/javascript.md` for standard JS patterns including:
- AJAX with fetch API
- Form validation
- DataTables initialization
- SweetAlert2 confirmations
- Dynamic table operations
- File upload handling

## Database Patterns

Read `references/database.md` for:
- PDO connection setup
- CRUD helper functions
- Pagination queries
- Search/filter patterns
- File upload handling with DB records

## Key Reminders

1. ALWAYS use the 3 institutional colors as the base of every design
2. ALWAYS use the custom button, download-button, and card components
3. ALWAYS use Poppins as primary font, Montserrat as secondary
4. ALWAYS write PHP with security in mind (prepared statements, XSS prevention, CSRF tokens)
5. ALWAYS make responsive designs using Bootstrap 5 grid
6. ALWAYS use Spanish for all UI text (labels, buttons, messages, titles)
7. NEVER use Bootstrap default blue/gray theme without overriding to institutional colors
8. NEVER use inline SQL without prepared statements
9. NEVER store passwords in plain text
