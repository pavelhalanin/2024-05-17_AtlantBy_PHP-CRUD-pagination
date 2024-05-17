<?php
$DB_HOST = '127.0.0.1';
$DB_USER = 'root';
$DB_PASS = '';
$DB_NAME = 'atlant_by_test_project';
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
if ($conn->connect_error) {
    printf("Connect Error: " . $conn->connect_error);
    die('Connect Error: ' . $conn->connect_error);
}
