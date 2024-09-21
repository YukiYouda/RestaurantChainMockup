<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

// POSTリクエストからパラメータを取得
$numberOfCompanies = $_POST['numberOfCompanies'] ?? 5;
$numberOfLocations = $_POST['numberOfLocations'] ?? 5;
$totalEmployees = $_POST['totalEmployees'] ?? 5;
$salary = $_POST['salary'] ?? 500;
$format = $_POST['format'] ?? 'html';

// パラメータが正しい形式であることを確認
$numberOfCompanies = (int)$numberOfCompanies;
$numberOfLocations = (int)$numberOfLocations;
$totalEmployees = (int)$totalEmployees;

// resraurantChainの生成
$restaurantChains= RandomGenerator::restaurantChains($numberOfCompanies, $numberOfCompanies, $numberOfLocations, $totalEmployees, $salary);

// 検証
if (is_null($numberOfCompanies) || is_null($format)) {
    exit('Missing parameters.');
}

if (!is_numeric($numberOfCompanies) || $numberOfCompanies < 1 || $numberOfCompanies > 100) {
    exit('Invalid numberOfCompanies. Must be a number between 1 and 100.');
}

$allowedFormats = ['json', 'txt', 'html', 'md'];
if (!in_array($format, $allowedFormats)) {
    exit('Invalid type. Must be one of: ' . implode(', ', $allowedFormats));
}

if ($format === 'markdown') {
    header('Content-Type: text/markdown');
    header('Content-Disposition: attachment; filename="users.md"');
    foreach ($restaurantChains as $restaurantChain) {
        echo $restaurantChain->toMarkdown();
    }
} elseif ($format === 'json') {
    header('Content-Type: application/json');
    header('Content-Disposition: attachment; filename="users.json"');
    $$restaurantChainsArray = array_map(fn($restaurantChain) => $restaurantChain->toArray(), $restaurantChains);
    echo json_encode($restaurantChainsArray);
} elseif ($format === 'txt') {
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="users.txt"');
    foreach ($restaurantChains as $restaurantChain) {
        echo $restaurantChain->toString();
    }
} else {
    // HTMLをデフォルトに
    header('Content-Type: text/html');
    foreach ($restaurantChains as $restaurantChain) {
        echo $restaurantChain->toHTML();
    }
}