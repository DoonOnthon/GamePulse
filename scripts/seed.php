<?php

// Load environment variables from .env file
$envFile = __DIR__ . '/../.env';
if (!file_exists($envFile)) {
    die("Error: .env file not found!\n");
}
$env = parse_ini_file($envFile);

$host = $env['DB_HOST'] ?? '127.0.0.1';
$user = $env['DB_USER'] ?? 'root';
$pass = $env['DB_PASS'] ?? '';
$dbname = $env['DB_NAME'] ?? 'gamepulse';
$migrationsDir = __DIR__ . '/../seeders';

$conn = new mysqli($host, $user, $pass);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if not exists
$conn->query("CREATE DATABASE IF NOT EXISTS $dbname");
$conn->select_db($dbname);

// Get list of migration files
$migrations = glob("$migrationsDir/*.sql");

// Apply each migration
foreach ($migrations as $file) {
    $query = file_get_contents($file);
    if ($conn->multi_query($query)) {
        echo "Applied seeder: " . basename($file) . "\n";
        while ($conn->next_result()) {;} // Flush multi_query results
    } else {
        echo "Error applying seeder " . basename($file) . ": " . $conn->error . "\n";
    }
}

$conn->close();

echo "Migrations applied successfully!\n";
?>