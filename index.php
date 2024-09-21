<?php
// コードベースのファイルのオートロード
spl_autoload_extensions(".php");
spl_autoload_register();

// composerの依存関係のオートロード
require_once 'vendor/autoload.php';

use Helpers\RandomGenerator;

// クエリ文字列からパラメータを取得
$min = $_GET['min'] ?? 5;
$max = $_GET['max'] ?? 20;
$numberOfLocation = $_GET['numberOfLocation'] ?? 5;
$totalEmployees = $_GET['totalEmployees'] ?? 5;
$salary = $_GET['salary'] ?? 500;

// パラメータが整数であることを確認
$min = (int)$min;
$max = (int)$max;
$numberOfLocation = (int)$numberOfLocation;
$totalEmployees = (int)$totalEmployees;
$salary = (int)$salary;

// resraurantChainの生成
$restaurantChains= RandomGenerator::restaurantChains($min, $max, $numberOfLocation, $totalEmployees, $salary);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profiles</title>
    <style>
        /* ユーザーカードのスタイル */
    </style>
</head>
<body>
    <?php foreach ($restaurantChains as $restaurantChain): ?>
        <?php echo $restaurantChain->toHTML() ?>
    <?php endforeach; ?>
</body>
</html>