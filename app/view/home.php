<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lent-Sports | Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php URLROOT; ?>/css/home.css">
</head>
<body>

    <div class="container">
        <h3>Welcome to Lend-Sports!</h3>

        <div class="nav-actions">
    <a href="<?= URLROOT; ?>/lent" class="btn btn-lend">Lend an Item</a>
    <a href="<?= URLROOT; ?>/retrieve" class="btn btn-retrieve">Manage Returns</a>
    <a href="<?= URLROOT; ?>/users/logout" class="btn btn-logout">Logout</a>
</div>

        <h2 style="text-align: left; margin-bottom: 20px;">Current Inventory</h2>

        <div class="items-grid">
    <?php foreach($data as $d): 
        // Assigning icons based on your specific item names
        $name = strtolower($d->itemName);
        $icon = match(true) {
            str_contains($name, 'badminton') => '🏸',
            str_contains($name, 'carrom')    => '🔲',
            str_contains($name, 'bat')       => '🏏',
            str_contains($name, 'volleyball') => '🏐',
            str_contains($name, 'table')      => '🏓',
            str_contains($name, 'chess')     => '♟️',
            str_contains($name, 'card')      => '🃏',
            str_contains($name, 'netball')   => '🏀',
            default                          => '🏆',
        };
    ?>
        <div class="item-card <?= ($d->quantity <= 0) ? 'out-of-stock-card' : ''; ?>">
            <span class="item-icon"><?= $icon; ?></span> 
            
            <span class="item-name"><?= htmlspecialchars($d->itemName); ?></span>
            
            <div class="item-qty">
                Stock: 
                <span class="<?= ($d->quantity > 0) ? 'stock-number' : 'out-of-stock'; ?>">
                    <?= htmlspecialchars($d->quantity); ?>
                </span>
            </div>

            <?php if($d->quantity <= 0): ?>
                <div class="status-overlay">Unavailable</div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
</div>
    </div>

</body>
</html>