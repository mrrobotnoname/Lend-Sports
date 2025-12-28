<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend Sport Items</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4f46e5;
            --primary-hover: #4338ca;
            --bg-color: #f3f4f6;
            --card-bg: #ffffff;
            --text-main: #1f2937;
            --border-color: #d1d5db;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background: var(--card-bg);
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            width: 100%;
            max-width: 400px;
        }

        h2 {
            margin-top: 0;
            text-align: center;
            color: var(--text-main);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 0.625rem;
            border: 1px solid var(--border-color);
            border-radius: 6px;
            font-size: 0.95rem;
            box-sizing: border-box; /* Ensures padding doesn't affect width */
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .btn-submit {
            width: 100%;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 1rem;
            transition: background-color 0.2s;
        }

        .btn-submit:hover {
            background-color: var(--primary-hover);
        }

        /* Styling for the select placeholder */
        select:invalid {
            color: #9ca3af;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Lend Sport Item</h2>
    
    <form action="" method="POST">
        <div class="form-group">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
        </div>

        <div class="form-group">
            <label for="id">Student/Staff ID</label>
            <input type="text" name="id" id="id" placeholder="ID Number" required>
        </div>

        <div class="form-group">
            <label for="phoneNo">Phone Number</label>
            <input type="text" name="phoneNo" id="phoneNo" placeholder="012-3456789" required>
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
            <label for="quantity" id="available">Quantity</label>
            <input type="number" name="quantity" id="quantity" max="1" min="1" value="1">
        </div>

        <button type="submit" class="btn-submit">Lend Sport Item</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="<?php echo URLROOT; ?>/js/lent.js"></script>

</body>
</html>