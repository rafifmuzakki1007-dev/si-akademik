<?php
namespace App\Controllers;

class Controller 
{
    protected function view(string $view, array $data = []): void 
    {
        extract($data);
        // Menggunakan layout utama yang membungkus konten view
        $content = __DIR__ . '/../Views/' . $view . '.php';
        require_once __DIR__ . '/../Views/layouts/main.php';
    }

    protected function redirect(string $url): void 
    {
        header("Location: " . $url);
        exit;
    }
}