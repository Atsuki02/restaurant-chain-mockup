<?php
require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function ($class) {
    $prefix = '';
    $base_dir = __DIR__ . '/../src/'; 
    
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    
    if (file_exists($file)) {
        require $file;
    }
});

use Helpers\RandomGenerator;

$employeesCount = isset($_POST['employees']) ? (int)$_POST['employees'] : 10;
$salaryMin = isset($_POST['salary-min']) ? (int)$_POST['salary-min'] : 20000;
$salaryMax = isset($_POST['salary-max']) ? (int)$_POST['salary-max'] : 100000;
$locationsCount = isset($_POST['locations']) ? (int)$_POST['locations'] : 10;
$format = $_POST['format'] ?? 'html';

$restaurantChains = RandomGenerator::restaurantChains($employeesCount, $locationsCount, $salaryMin, $salaryMax);


switch ($format) {
    case 'markdown':
        header('Content-Type: text/markdown');
        header('Content-Disposition: attachment; filename="restaurant_data.md"');
        foreach ($restaurantChains as $chain) {
            echo $chain->toMarkdown();
        }
        break;
    case 'json':
        header('Content-Type: application/json');
        header('Content-Disposition: attachment; filename="restaurant_data.json"');
        echo json_encode(array_map(fn($chain) => $chain->toArray(), $restaurantChains));
        break;
    case 'txt':
        header('Content-Type: text/plain');
        header('Content-Disposition: attachment; filename="restaurant_data.txt"');
        foreach ($restaurantChains as $chain) {
            echo $chain->toString();
        }
        break;
    case 'html':
        include 'index.php';
        break;
    default:
        include 'index.php';
        break;
}