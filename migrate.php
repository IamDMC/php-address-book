<?php

require __DIR__ . '/vendor/autoload.php';

use Iamdmc\PhpAddressBook\Database;

$db = Database::connect();

$migrationsPath = __DIR__ . '/migrations';

$files = scandir($migrationsPath);

foreach ($files as $file){
    if (pathinfo($file, PATHINFO_EXTENSION) !== 'sql'){
        continue;
    }

    $sql = file_get_contents($migrationsPath . '/' . $file);

    echo "Running migration: $file\n";

    $db->exec($sql);
}

echo "Migrations completed. \n";