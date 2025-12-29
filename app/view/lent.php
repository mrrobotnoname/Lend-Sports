<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lend Sport Items</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4e73df;
            --success: #1cc88a;
            --dark: #2e3750;
            --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: var(--bg-gradient);
            min-height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* The Main Pop-up Card */
        .form-container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 450px;
            transform: translateY(0);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .form-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        h2 {
            text-align: center;
            color: var(--dark);
            font-weight: 600;
            font-size: 24px;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 10px;
        }

        /* Underline effect */
        h2::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 50px;
            height: 4px;
            background: var(--primary);
            border-radius: 10px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #858796;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e3e6f0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            color: var(--dark);
            transition: all 0.3s;
            box-sizing: border-box;
        }

        input:focus, select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 10px rgba(78, 115, 223, 0.15);
        }

        /* Quantity Display Badge */
        #available {
            display: flex;
            justify-content: space-between;
        }

        .stock-count {
            color: var(--success);
            font-size: 11px;
        }

        /* Submit Button with Pop effect */
        .btn-submit {
            width: 100%;
            background-color: var(--primary);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
            transition: all 0.3s;
            box-shadow: 0 4px 10px rgba(78, 115, 223, 0.3);
        }

        .btn-submit:hover {
            background-color: #3e5fbc;
            transform: scale(1.02);
            box-shadow: 0 6px 15px rgba(78, 115, 223, 0.4);
        }

        .btn-submit:active {
            transform: scale(0.98);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            color: #858796;
            font-size: 13px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: var(--primary);
        }
    </style>
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