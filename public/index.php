<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/app.php';
$routes = require_once __DIR__ . '/../routes/web.php';

require_once __DIR__ . '/../app/Core/Database.php';
require_once __DIR__ . '/../app/Controllers/Controller.php';
require_once __DIR__ . '/../app/Models/MahasiswaRepository.php';
require_once __DIR__ . '/../app/Controllers/MahasiswaController.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_SERVER['REQUEST_METHOD'];

if (isset($routes[$method][$uri])) {
    [$cName, $act] = $routes[$method][$uri];
    $cClass = "App\\Controllers\\{$cName}";
    (new $cClass())->$act();
    exit;
}

foreach ($routes[$method] as $route => $routeData) {
    $pattern = "@^" . preg_replace('/\{id\}/', '([0-9]+)', $route) . "$@D";
    if (preg_match($pattern, $uri, $matches)) {
        array_shift($matches);
        [$cName, $act] = $routeData;
        $cClass = "App\\Controllers\\{$cName}";
        call_user_func_array([new $cClass(), $act], $matches);
        exit;
    }
}

http_response_code(404);
echo "404 - Halaman tidak ditemukan";