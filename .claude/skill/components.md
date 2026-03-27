# Additional Components Reference

## Table of Contents
1. Navbar
2. Sidebar
3. Data Tables
4. Login Form
5. Dashboard Stat Cards
6. Modals
7. Toast Notifications
8. Loading Spinner
9. Breadcrumbs
10. Status Badges
11. Search Bar
12. Pagination

---

## 1. Navbar

```html
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: var(--color-vino);">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="index.php">
      <img src="assets/img/logo.png" alt="Logo" height="40">
      <span style="font-family: var(--font-primary); font-weight: 600;">Sistema SS & PP</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mainNav">
      <ul class="navbar-nav ms-auto align-items-center gap-2">
        <li class="nav-item">
          <a class="nav-link" href="modules/dashboard/"><i class="bi bi-speedometer2 me-1"></i>Dashboard</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-person-circle me-1"></i><?php echo $_SESSION['nombre'] ?? 'Usuario'; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="modules/usuarios/perfil.php"><i class="bi bi-person me-2"></i>Mi perfil</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
```

## 2. Sidebar

```html
<aside class="sidebar d-flex flex-column" id="sidebar">
  <div class="sidebar-header p-3 text-center">
    <img src="assets/img/logo-white.png" alt="Logo" class="img-fluid mb-2" style="max-height:60px;">
    <h6 class="text-white mb-0" style="font-family:var(--font-primary);">Panel de Control</h6>
  </div>
  <nav class="sidebar-nav flex-grow-1 py-3">
    <a href="modules/dashboard/" class="sidebar-link active"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a>
    <a href="modules/alumnos/" class="sidebar-link"><i class="bi bi-people"></i><span>Alumnos</span></a>
    <a href="modules/proyectos/" class="sidebar-link"><i class="bi bi-folder"></i><span>Proyectos</span></a>
    <a href="modules/reportes/" class="sidebar-link"><i class="bi bi-file-earmark-bar-graph"></i><span>Reportes</span></a>
    <a href="modules/usuarios/" class="sidebar-link"><i class="bi bi-gear"></i><span>Usuarios</span></a>
  </nav>
</aside>
```

```css
.sidebar {
  width: 260px;
  min-height: 100vh;
  background-color: var(--color-vino-dark);
  position: fixed;
  left: 0;
  top: 0;
  z-index: 1000;
  transition: transform 0.3s ease;
}
.sidebar-link {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 20px;
  color: rgba(255,255,255,0.75);
  text-decoration: none;
  font-family: var(--font-primary);
  font-size: 0.9rem;
  transition: all 0.2s ease;
  border-left: 3px solid transparent;
}
.sidebar-link:hover,
.sidebar-link.active {
  background-color: rgba(255,255,255,0.08);
  color: var(--color-arena);
  border-left-color: var(--color-dorado);
}
.sidebar-link i {
  font-size: 1.1rem;
  width: 24px;
  text-align: center;
}
.main-content {
  margin-left: 260px;
  padding: 24px;
  min-height: 100vh;
  background-color: var(--color-light-gray);
}
@media (max-width: 768px) {
  .sidebar { transform: translateX(-100%); }
  .sidebar.show { transform: translateX(0); }
  .main-content { margin-left: 0; }
}
```

## 3. Data Tables

```html
<div class="card-custom">
  <div class="card-custom-header">
    <span class="card-custom-dot card-custom-dot-vino"></span>
    <span class="card-custom-dot card-custom-dot-dorado"></span>
    <span class="card-custom-dot card-custom-dot-arena"></span>
  </div>
  <div class="card-custom-body">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h5 class="card-custom-title mb-0">Listado de Alumnos</h5>
      <button class="btn-custom btn-custom-vino" data-bs-toggle="modal" data-bs-target="#addModal">
        <i class="bi bi-plus-lg"></i> Nuevo
      </button>
    </div>
    <div class="table-responsive">
      <table class="table table-hover align-middle" id="dataTable">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Matrícula</th>
            <th>Carrera</th>
            <th>Estado</th>
            <th class="text-center">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <!-- Dynamic rows from PHP -->
        </tbody>
      </table>
    </div>
  </div>
</div>
```

```css
.table thead {
  background-color: var(--color-vino);
  color: var(--color-white);
  font-family: var(--font-primary);
  font-weight: 500;
  font-size: 0.85rem;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
.table thead th {
  border: none;
  padding: 14px 16px;
}
.table tbody td {
  padding: 12px 16px;
  font-family: var(--font-secondary);
  font-size: 0.9rem;
  vertical-align: middle;
}
.table-hover tbody tr:hover {
  background-color: var(--color-arena-light);
}
```

## 4. Login Form

```html
<div class="login-wrapper">
  <div class="login-card">
    <div class="login-header">
      <img src="assets/img/logo.png" alt="Logo" class="login-logo">
      <h4>Iniciar Sesión</h4>
      <p>Sistema de Servicio Social y Prácticas Profesionales</p>
    </div>
    <form method="POST" action="includes/auth.php" id="loginForm">
      <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
      <div class="mb-3">
        <label class="form-label">Correo electrónico</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control" name="email" required>
        </div>
      </div>
      <div class="mb-3">
        <label class="form-label">Contraseña</label>
        <div class="input-group">
          <span class="input-group-text"><i class="bi bi-lock"></i></span>
          <input type="password" class="form-control" name="password" required>
          <button type="button" class="btn btn-outline-secondary toggle-password"><i class="bi bi-eye"></i></button>
        </div>
      </div>
      <button type="submit" class="btn-custom btn-custom-vino w-100 justify-content-center">
        <i class="bi bi-box-arrow-in-right"></i> Ingresar
      </button>
    </form>
  </div>
</div>
```

```css
.login-wrapper {
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: linear-gradient(135deg, var(--color-vino-dark) 0%, var(--color-vino) 50%, var(--color-dorado-dark) 100%);
  padding: 20px;
}
.login-card {
  background: var(--color-white);
  border-radius: 12px;
  padding: 40px;
  width: 100%;
  max-width: 420px;
  box-shadow: 0 20px 60px rgba(0,0,0,0.3);
}
.login-header {
  text-align: center;
  margin-bottom: 30px;
}
.login-logo {
  max-height: 80px;
  margin-bottom: 16px;
}
.login-header h4 {
  font-family: var(--font-primary);
  font-weight: 700;
  color: var(--color-vino);
}
.login-header p {
  font-family: var(--font-secondary);
  color: var(--color-gray);
  font-size: 0.85rem;
}
```

## 5. Dashboard Stat Cards

```html
<div class="row g-4 mb-4">
  <div class="col-md-6 col-xl-3">
    <div class="stat-card stat-card-vino">
      <div class="stat-card-icon"><i class="bi bi-people-fill"></i></div>
      <div class="stat-card-info">
        <span class="stat-card-value"><?php echo $totalAlumnos; ?></span>
        <span class="stat-card-label">Alumnos Activos</span>
      </div>
    </div>
  </div>
  <!-- Repeat for other stats -->
</div>
```

```css
.stat-card {
  display: flex;
  align-items: center;
  gap: 16px;
  padding: 20px;
  border-radius: 10px;
  background: var(--color-white);
  box-shadow: 0 2px 8px rgba(0,0,0,0.08);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.stat-card:hover {
  transform: translateY(-3px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}
.stat-card-icon {
  width: 56px;
  height: 56px;
  border-radius: 12px;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.5rem;
}
.stat-card-vino .stat-card-icon   { background-color: rgba(105,28,50,0.1); color: var(--color-vino); }
.stat-card-dorado .stat-card-icon { background-color: rgba(188,149,92,0.15); color: var(--color-dorado-dark); }
.stat-card-arena .stat-card-icon  { background-color: rgba(236,215,152,0.3); color: var(--color-dorado-dark); }
.stat-card-value {
  display: block;
  font-family: var(--font-primary);
  font-weight: 700;
  font-size: 1.5rem;
  color: var(--color-dark);
}
.stat-card-label {
  font-family: var(--font-secondary);
  font-size: 0.8rem;
  color: var(--color-gray);
  text-transform: uppercase;
  letter-spacing: 0.5px;
}
```

## 6. Modals (CRUD)

```html
<div class="modal fade" id="addModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header" style="background-color:var(--color-vino); color:white;">
        <h5 class="modal-title" style="font-family:var(--font-primary);">
          <i class="bi bi-plus-circle me-2"></i>Agregar Registro
        </h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body p-4">
        <!-- Form fields here -->
      </div>
      <div class="modal-footer">
        <button class="btn-custom" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn-custom btn-custom-vino" id="saveBtn">
          <i class="bi bi-check-lg me-1"></i>Guardar
        </button>
      </div>
    </div>
  </div>
</div>
```

## 7. Toast Notifications

```css
.toast-custom {
  position: fixed;
  top: 20px;
  right: 20px;
  z-index: 9999;
  min-width: 300px;
  border-radius: 8px;
  padding: 16px 20px;
  font-family: var(--font-primary);
  color: white;
  display: flex;
  align-items: center;
  gap: 12px;
  box-shadow: 0 8px 24px rgba(0,0,0,0.15);
  transform: translateX(120%);
  transition: transform 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}
.toast-custom.show { transform: translateX(0); }
.toast-custom.success { background-color: var(--color-success); }
.toast-custom.error   { background-color: var(--color-danger); }
.toast-custom.warning { background-color: var(--color-warning); color: var(--color-dark); }
.toast-custom.info    { background-color: var(--color-vino); }
```

```javascript
function showToast(message, type = 'success') {
  const icons = { success: 'check-circle', error: 'x-circle', warning: 'exclamation-triangle', info: 'info-circle' };
  const toast = document.createElement('div');
  toast.className = `toast-custom ${type}`;
  toast.innerHTML = `<i class="bi bi-${icons[type]} fs-5"></i><span>${message}</span>`;
  document.body.appendChild(toast);
  requestAnimationFrame(() => toast.classList.add('show'));
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 400);
  }, 3500);
}
```

## 8. Loading Spinner

```html
<div class="spinner-overlay" id="loadingSpinner">
  <div class="spinner-content">
    <div class="spinner-border" style="color: var(--color-vino); width: 3rem; height: 3rem;" role="status"></div>
    <p class="mt-3" style="font-family: var(--font-primary); color: var(--color-vino);">Cargando...</p>
  </div>
</div>
```

```css
.spinner-overlay {
  position: fixed;
  inset: 0;
  background: rgba(255,255,255,0.85);
  display: flex;
  align-items: center;
  justify-content: center;
  z-index: 9999;
  opacity: 0;
  pointer-events: none;
  transition: opacity 0.3s ease;
}
.spinner-overlay.active { opacity: 1; pointer-events: all; }
.spinner-content { text-align: center; }
```

## 9. Breadcrumbs

```html
<nav aria-label="breadcrumb" class="mb-4">
  <ol class="breadcrumb custom-breadcrumb">
    <li class="breadcrumb-item"><a href="modules/dashboard/">Dashboard</a></li>
    <li class="breadcrumb-item"><a href="modules/alumnos/">Alumnos</a></li>
    <li class="breadcrumb-item active">Detalle</li>
  </ol>
</nav>
```

```css
.custom-breadcrumb {
  background: transparent;
  padding: 0;
  font-family: var(--font-secondary);
  font-size: 0.85rem;
}
.custom-breadcrumb a {
  color: var(--color-vino);
  text-decoration: none;
}
.custom-breadcrumb a:hover { color: var(--color-dorado); }
.custom-breadcrumb .active { color: var(--color-gray); }
```

## 10. Status Badges

```css
.badge-status {
  padding: 5px 12px;
  border-radius: 20px;
  font-family: var(--font-primary);
  font-size: 0.75rem;
  font-weight: 500;
  letter-spacing: 0.3px;
}
.badge-activo    { background-color: rgba(40,167,69,0.12); color: #28A745; }
.badge-pendiente { background-color: rgba(188,149,92,0.15); color: var(--color-dorado-dark); }
.badge-rechazado { background-color: rgba(220,53,69,0.12); color: #DC3545; }
.badge-completado { background-color: rgba(105,28,50,0.1); color: var(--color-vino); }
```

```html
<span class="badge-status badge-activo">Activo</span>
<span class="badge-status badge-pendiente">Pendiente</span>
<span class="badge-status badge-rechazado">Rechazado</span>
<span class="badge-status badge-completado">Completado</span>
```

## 11. Search Bar

```html
<div class="search-bar">
  <i class="bi bi-search"></i>
  <input type="text" class="form-control" placeholder="Buscar alumno, matrícula, carrera..." id="searchInput">
  <button class="btn-custom btn-custom-vino" id="searchBtn">Buscar</button>
</div>
```

```css
.search-bar {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 8px 16px;
  background: var(--color-white);
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.06);
  border: 1px solid rgba(0,0,0,0.08);
}
.search-bar i { color: var(--color-gray); font-size: 1.1rem; }
.search-bar .form-control {
  border: none;
  box-shadow: none;
  font-family: var(--font-secondary);
}
.search-bar .form-control:focus { box-shadow: none; }
```

## 12. Empty State

```html
<div class="empty-state">
  <i class="bi bi-inbox"></i>
  <h5>No hay registros</h5>
  <p>Aún no se han agregado elementos a esta sección.</p>
  <button class="btn-custom btn-custom-dorado"><i class="bi bi-plus-lg me-1"></i>Agregar primero</button>
</div>
```

```css
.empty-state {
  text-align: center;
  padding: 60px 20px;
  color: var(--color-gray);
}
.empty-state i {
  font-size: 3rem;
  color: var(--color-arena);
  margin-bottom: 16px;
  display: block;
}
.empty-state h5 {
  font-family: var(--font-primary);
  font-weight: 600;
  color: var(--color-dark);
}
.empty-state p {
  font-family: var(--font-secondary);
  font-size: 0.9rem;
  max-width: 400px;
  margin: 8px auto 20px;
}
```
