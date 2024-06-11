<?php

spl_autoload_register(function ($class) {
    // Zamień backslashes na slashe, aby obsługiwać przestrzenie nazw
    $class = str_replace('\\', '/', $class);

    // Ścieżka do folderu src
    $file = __DIR__ . '/src/' . $class . '.php';

    // Sprawdź, czy plik istnieje, zanim spróbujesz go załadować
    if (file_exists($file)) {
        require_once $file;
    }
});
