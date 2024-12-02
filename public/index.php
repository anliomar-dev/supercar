<?php
require_once(__DIR__ . '/../app/database/Database.php');

$db = new Database();
$conn = $db->getConnection();