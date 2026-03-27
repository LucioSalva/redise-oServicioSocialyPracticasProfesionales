# JavaScript Patterns Reference

## Table of Contents
1. AJAX Fetch Wrapper
2. Form Validation
3. CRUD Operations
4. SweetAlert2 Confirmations
5. DataTables Init
6. Toggle Password
7. File Upload Preview
8. Dynamic Search/Filter
9. Print Function

---

## 1. AJAX Fetch Wrapper

Standard fetch wrapper for all AJAX calls in the project:

```javascript
async function apiCall(url, method = 'GET', data = null) {
  const options = {
    method,
    headers: { 'Content-Type': 'application/json' },
  };
  if (data && method !== 'GET') {
    options.body = JSON.stringify(data);
  }
  try {
    showLoading();
    const response = await fetch(url, options);
    if (!response.ok) throw new Error(`HTTP ${response.status}`);
    return await response.json();
  } catch (error) {
    console.error('API Error:', error);
    showToast('Error al conectar con el servidor', 'error');
    return null;
  } finally {
    hideLoading();
  }
}

// For form submissions (supports file uploads)
async function apiFormSubmit(url, formData) {
  try {
    showLoading();
    const response = await fetch(url, { method: 'POST', body: formData });
    if (!response.ok) throw new Error(`HTTP ${response.status}`);
    return await response.json();
  } catch (error) {
    console.error('API Error:', error);
    showToast('Error al procesar la solicitud', 'error');
    return null;
  } finally {
    hideLoading();
  }
}
```

## 2. Form Validation

Client-side validation before submit:

```javascript
function validateForm(formId) {
  const form = document.getElementById(formId);
  const inputs = form.querySelectorAll('[required]');
  let valid = true;

  inputs.forEach(input => {
    removeError(input);
    if (!input.value.trim()) {
      showError(input, 'Este campo es obligatorio');
      valid = false;
    } else if (input.type === 'email' && !isValidEmail(input.value)) {
      showError(input, 'Correo electrónico no válido');
      valid = false;
    }
  });
  return valid;
}

function showError(input, message) {
  input.classList.add('is-invalid');
  const feedback = document.createElement('div');
  feedback.className = 'invalid-feedback';
  feedback.textContent = message;
  input.parentNode.appendChild(feedback);
}

function removeError(input) {
  input.classList.remove('is-invalid');
  const feedback = input.parentNode.querySelector('.invalid-feedback');
  if (feedback) feedback.remove();
}

function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}
```

## 3. CRUD Operations Pattern

```javascript
// CREATE
async function createRecord(formId, url) {
  if (!validateForm(formId)) return;
  const form = document.getElementById(formId);
  const formData = new FormData(form);
  const result = await apiFormSubmit(url, formData);
  if (result && result.success) {
    showToast(result.message || 'Registro creado exitosamente');
    bootstrap.Modal.getInstance(document.querySelector('.modal.show'))?.hide();
    loadTable();
    form.reset();
  } else if (result) {
    showToast(result.message || 'Error al crear registro', 'error');
  }
}

// READ (load table)
async function loadTable(page = 1, search = '') {
  const result = await apiCall(`api/list.php?page=${page}&search=${encodeURIComponent(search)}`);
  if (result && result.data) {
    renderTable(result.data);
    renderPagination(result.pagination);
  }
}

// UPDATE
async function updateRecord(formId, url) {
  if (!validateForm(formId)) return;
  const form = document.getElementById(formId);
  const formData = new FormData(form);
  const result = await apiFormSubmit(url, formData);
  if (result && result.success) {
    showToast(result.message || 'Registro actualizado');
    bootstrap.Modal.getInstance(document.querySelector('.modal.show'))?.hide();
    loadTable();
  }
}

// DELETE
async function deleteRecord(id, url) {
  const confirmed = await confirmAction('¿Estás seguro?', 'Esta acción no se puede deshacer');
  if (!confirmed) return;
  const result = await apiCall(url, 'POST', { id, action: 'delete' });
  if (result && result.success) {
    showToast('Registro eliminado');
    loadTable();
  }
}
```

## 4. SweetAlert2 Confirmations

Include SweetAlert2 CDN in your page, then use:

```javascript
async function confirmAction(title = '¿Estás seguro?', text = '') {
  const result = await Swal.fire({
    title,
    text,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#691C32',
    cancelButtonColor: '#6C757D',
    confirmButtonText: 'Sí, continuar',
    cancelButtonText: 'Cancelar',
    customClass: { popup: 'swal-custom' }
  });
  return result.isConfirmed;
}

function alertSuccess(message) {
  Swal.fire({
    icon: 'success',
    title: '¡Éxito!',
    text: message,
    confirmButtonColor: '#691C32',
    timer: 2500,
    timerProgressBar: true
  });
}

function alertError(message) {
  Swal.fire({
    icon: 'error',
    title: 'Error',
    text: message,
    confirmButtonColor: '#691C32'
  });
}
```

## 5. DataTables Initialization

```javascript
function initDataTable(tableId, options = {}) {
  const defaults = {
    language: {
      url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-MX.json'
    },
    responsive: true,
    pageLength: 10,
    lengthMenu: [5, 10, 25, 50],
    dom: '<"d-flex justify-content-between align-items-center mb-3"lf>rtip',
    order: [[0, 'desc']],
  };
  return new DataTable(`#${tableId}`, { ...defaults, ...options });
}
```

## 6. Toggle Password Visibility

```javascript
document.querySelectorAll('.toggle-password').forEach(btn => {
  btn.addEventListener('click', function() {
    const input = this.closest('.input-group').querySelector('input');
    const icon = this.querySelector('i');
    if (input.type === 'password') {
      input.type = 'text';
      icon.classList.replace('bi-eye', 'bi-eye-slash');
    } else {
      input.type = 'password';
      icon.classList.replace('bi-eye-slash', 'bi-eye');
    }
  });
});
```

## 7. File Upload Preview

```javascript
function setupFilePreview(inputId, previewId) {
  document.getElementById(inputId).addEventListener('change', function(e) {
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';
    Array.from(e.target.files).forEach(file => {
      if (file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = (ev) => {
          const img = document.createElement('img');
          img.src = ev.target.result;
          img.style.cssText = 'max-width:120px;max-height:120px;border-radius:8px;margin:4px;object-fit:cover;';
          preview.appendChild(img);
        };
        reader.readAsDataURL(file);
      } else {
        const span = document.createElement('span');
        span.className = 'badge-status badge-pendiente me-2';
        span.textContent = file.name;
        preview.appendChild(span);
      }
    });
  });
}
```

## 8. Dynamic Search with Debounce

```javascript
function debounce(func, wait = 400) {
  let timeout;
  return function(...args) {
    clearTimeout(timeout);
    timeout = setTimeout(() => func.apply(this, args), wait);
  };
}

const searchInput = document.getElementById('searchInput');
if (searchInput) {
  searchInput.addEventListener('input', debounce(function() {
    loadTable(1, this.value);
  }, 400));
}
```

## 9. Loading Helpers

```javascript
function showLoading() {
  document.getElementById('loadingSpinner')?.classList.add('active');
}
function hideLoading() {
  document.getElementById('loadingSpinner')?.classList.remove('active');
}
```

## 10. Print Section

```javascript
function printSection(elementId) {
  const content = document.getElementById(elementId).innerHTML;
  const win = window.open('', '_blank');
  win.document.write(`
    <!DOCTYPE html>
    <html lang="es">
    <head>
      <meta charset="UTF-8">
      <title>Impresión</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="assets/css/styles.css" rel="stylesheet">
      <style>body{padding:20px;}</style>
    </head>
    <body>${content}</body>
    </html>
  `);
  win.document.close();
  win.onload = () => { win.print(); win.close(); };
}
```
