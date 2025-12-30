<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend Sport Items</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="<?php URLROOT; ?>/css/lent.css">
</head>
<body>

<div class="form-container">
    <h2>Lend Sport Item</h2>
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Ex: John Doe" required>
        </div>

        <div class="form-group">
            <label for="id">Student/Staff ID</label>
            <input type="text" name="id" id="id" placeholder="Ex: IT2100123" required>
        </div>

        <div class="form-group">
            <label for="phoneNo">Phone Number</label>
            <input type="text" name="phoneNo" id="phoneNo" placeholder="07x-xxxxxxx" required>
        </div>

        <div class="form-group">
            <label for="selectItem">Select Item</label>
            <select name="item" id="selectItem" required>
                <option value="" selected disabled>-- Choose an Item --</option>
                <?php foreach($data as $d): ?>
                    <option value="<?php echo $d->id; ?>">
                        <?php echo $d->itemName; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="quantity" id="available">
                Quantity <span class="stock-count" id="stock-display"></span>
            </label>
            <input type="number" name="quantity" id="quantity" max="1" min="1" value="1">
        </div>

        <button type="submit" class="btn-submit">Confirm Lending</button>
        
        <a href="<?php echo URLROOT; ?>" class="back-link">← View All Lent Records</a>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/lent.js"></script>

</body>
</html>