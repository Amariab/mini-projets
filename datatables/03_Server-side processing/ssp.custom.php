<?php
require 'ssp.class.php';
require 'config.php';
$pdo = require 'config.php';

$table = 'users';
$primaryKey = 'id';
$columns = [
    ['db' => 'name', 'dt' => 0],
    ['db' => 'email', 'dt' => 1],
    ['db' => 'age', 'dt' => 2],
    ['db' => 'salary', 'dt' => 3, 'formatter' => function($d){ return '€' . number_format($d, 2); }]
];
$sql_details = ['user' => 'root', 'pass' => '', 'db' => 'demo_datatables', 'host' => 'localhost', 'pdo' => $pdo];
echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns));
?>