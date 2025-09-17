<?php
require_once '../model/Connector.php';
$conn = new Connector();

// Example queries
$monthly = $conn->fetchOne("SELECT SUM(amount) as total FROM earnings_tb WHERE year=YEAR(CURDATE()) AND month=MONTHNAME(CURDATE())");
$annual = $conn->fetchOne("SELECT SUM(amount) as total FROM earnings_tb WHERE year=YEAR(CURDATE())");
$pending = $conn->fetchOne("SELECT COUNT(*) as total FROM booking_tb WHERE booking_status='pending'");
$tasks   = $conn->fetchAll("SELECT name, progress FROM tasks_tb");

$response = [
    "monthly" => $monthly['total'] ?? 0,
    "annual"  => $annual['total'] ?? 0,
    "pending" => $pending['total'] ?? 0,
    "tasks"   => $tasks
];

header('Content-Type: application/json');
echo json_encode($response);