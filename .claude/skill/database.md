# Database Patterns Reference

## Table of Contents
1. PDO Connection
2. CRUD Helper Class
3. Pagination
4. Search & Filter
5. File Upload with DB
6. Auth Queries
7. CSRF Token Generation

---

## 1. PDO Connection (`config/database.php`)

```php
<?php
class Database {
    private static ?PDO $instance = null;

    private const DB_HOST = 'localhost';
    private const DB_NAME = 'servicio_social_db';
    private const DB_USER = 'root';
    private const DB_PASS = '';
    private const DB_CHARSET = 'utf8mb4';

    public static function getConnection(): PDO {
        if (self::$instance === null) {
            try {
                $dsn = "mysql:host=" . self::DB_HOST
                     . ";dbname=" . self::DB_NAME
                     . ";charset=" . self::DB_CHARSET;

                self::$instance = new PDO($dsn, self::DB_USER, self::DB_PASS, [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]);
            } catch (PDOException $e) {
                error_log("Database connection failed: " . $e->getMessage());
                die("Error de conexión. Intente más tarde.");
            }
        }
        return self::$instance;
    }
}
```

## 2. CRUD Helper Class

```php
<?php
class CrudHelper {
    private PDO $db;
    private string $table;

    public function __construct(string $table) {
        $this->db = Database::getConnection();
        $this->table = $table;
    }

    // CREATE
    public function insert(array $data): int|false {
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));
        $sql = "INSERT INTO {$this->table} ({$columns}) VALUES ({$placeholders})";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        return $this->db->lastInsertId();
    }

    // READ ONE
    public function findById(int $id): array|false {
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id LIMIT 1");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    // READ ALL with pagination
    public function findAll(int $page = 1, int $perPage = 10, string $search = '', array $searchColumns = []): array {
        $offset = ($page - 1) * $perPage;

        $whereClause = '';
        $params = [];
        if ($search && !empty($searchColumns)) {
            $conditions = array_map(fn($col) => "{$col} LIKE :search", $searchColumns);
            $whereClause = 'WHERE ' . implode(' OR ', $conditions);
            $params['search'] = "%{$search}%";
        }

        // Count total
        $countSql = "SELECT COUNT(*) FROM {$this->table} {$whereClause}";
        $countStmt = $this->db->prepare($countSql);
        $countStmt->execute($params);
        $total = (int) $countStmt->fetchColumn();

        // Get records
        $sql = "SELECT * FROM {$this->table} {$whereClause} ORDER BY id DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->db->prepare($sql);
        foreach ($params as $key => $val) {
            $stmt->bindValue(":{$key}", $val);
        }
        $stmt->bindValue(':limit', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll();

        return [
            'data' => $data,
            'pagination' => [
                'total'       => $total,
                'per_page'    => $perPage,
                'current_page'=> $page,
                'total_pages' => ceil($total / $perPage),
            ]
        ];
    }

    // UPDATE
    public function update(int $id, array $data): bool {
        $sets = implode(', ', array_map(fn($col) => "{$col} = :{$col}", array_keys($data)));
        $sql = "UPDATE {$this->table} SET {$sets} WHERE id = :id";
        $data['id'] = $id;
        $stmt = $this->db->prepare($sql);
        return $stmt->execute($data);
    }

    // DELETE (soft delete if 'activo' column exists, otherwise hard delete)
    public function delete(int $id, bool $soft = true): bool {
        if ($soft) {
            $sql = "UPDATE {$this->table} SET activo = 0 WHERE id = :id";
        } else {
            $sql = "DELETE FROM {$this->table} WHERE id = :id";
        }
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

    // Custom query
    public function query(string $sql, array $params = []): array {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }
}
```

**Usage:**
```php
$alumnos = new CrudHelper('alumnos');
$result = $alumnos->findAll(page: 1, perPage: 10, search: 'Juan', searchColumns: ['nombre', 'matricula']);
$alumno = $alumnos->findById(5);
$newId = $alumnos->insert(['nombre' => 'María López', 'matricula' => '2024001', 'carrera_id' => 1]);
$alumnos->update(5, ['nombre' => 'María López García']);
$alumnos->delete(5); // soft delete
```

## 3. API Response Helper

```php
<?php
function jsonResponse(bool $success, string $message = '', array $data = [], int $statusCode = 200): void {
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'success' => $success,
        'message' => $message,
        'data'    => $data,
    ], JSON_UNESCAPED_UNICODE);
    exit;
}
```

## 4. Auth Queries

```php
<?php
// Login
function authenticateUser(string $email, string $password): array|false {
    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = :email AND activo = 1 LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        return $user;
    }
    return false;
}

// Register
function registerUser(array $data): int|false {
    $db = Database::getConnection();
    $stmt = $db->prepare("SELECT id FROM usuarios WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $data['email']]);
    if ($stmt->fetch()) return false; // email exists

    $stmt = $db->prepare(
        "INSERT INTO usuarios (nombre, email, password, rol, activo, created_at)
         VALUES (:nombre, :email, :password, :rol, 1, NOW())"
    );
    $stmt->execute([
        'nombre'   => $data['nombre'],
        'email'    => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_DEFAULT),
        'rol'      => $data['rol'] ?? 'alumno',
    ]);
    return $db->lastInsertId();
}
```

## 5. CSRF Token

```php
<?php
function generateCsrfToken(): string {
    if (empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

function validateCsrfToken(string $token): bool {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// In every form handler:
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!validateCsrfToken($_POST['csrf_token'] ?? '')) {
        jsonResponse(false, 'Token de seguridad inválido', [], 403);
    }
}
```

## 6. File Upload Helper

```php
<?php
function uploadFile(array $file, string $destination = 'uploads/', array $allowedTypes = ['pdf','jpg','jpeg','png']): array {
    $errors = [];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'Error al subir archivo'];
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedTypes)) {
        return ['success' => false, 'message' => 'Tipo de archivo no permitido'];
    }

    if ($file['size'] > $maxSize) {
        return ['success' => false, 'message' => 'El archivo excede 5MB'];
    }

    $newName = uniqid('file_', true) . '.' . $ext;
    $fullPath = rtrim($destination, '/') . '/' . $newName;

    if (!is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    if (move_uploaded_file($file['tmp_name'], $fullPath)) {
        return ['success' => true, 'path' => $fullPath, 'name' => $newName];
    }
    return ['success' => false, 'message' => 'No se pudo guardar el archivo'];
}
```
