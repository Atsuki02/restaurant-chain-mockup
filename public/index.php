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

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\styles.css"> 
    <title>User Profiles</title>
</head>
<body>
    <?php foreach($restaurantChains as $restaurantChain): ?>
        <div class="restaurant-chain">
            <h1><?php echo $restaurantChain->displayChainInfo() ?></h1>
            <h2>Restaurant Chain Information</h2>
            <?php foreach($restaurantChain->getRestaurantLocations() as $restaurantLocation): ?>
                <div class="restaurant-location">
                    <button class="accordion"><?php echo $restaurantLocation->getName() ?></button>
                    <div class="panel">
                        <p><?php echo $restaurantLocation->toHTML() ?></p>
                        <h3>Employees:</h3>
                        <?php foreach($restaurantLocation->getEmployees() as $employee): ?>
                            <div class="employee">
                                <?php echo $employee->toHTML() ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>

<script>
    const acc = document.getElementsByClassName("accordion");
    let i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        let panel = this.nextElementSibling;
        if (panel.style.display === "block") {
        panel.style.display = "none";
        } else {
        panel.style.display = "block";
        }
    });
    }
</script>
</body>
</html>