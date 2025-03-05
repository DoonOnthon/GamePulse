<?php

// Load environment variables
require_once __DIR__ . '/../config/env.php';

// Database credentials
$host = DB_HOST;
$dbname = DB_NAME;
$user = DB_USER;
$username = DB_USER;
$password = DB_PASS;

// Create MySQLi connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Database connection failed: ". $conn->connect_error);
}
