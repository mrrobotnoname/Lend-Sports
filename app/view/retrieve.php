<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lent Items Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #4e73df;
            --success: #1cc88a;
            --dark: #2e3750;
            --light: #f8f9fc;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
            margin: 0;
            padding: 40px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transform: translateY(0);
            transition: transform 0.3s ease;
        }

        .container:hover {
            transform: translateY(-5px);
        }

        h4 {
            text-align: center;
            color: var(--dark);
            font-weight: 600;
            font-size: 28px;
            margin-bottom: 30px;
            border-bottom: 3px solid var(--primary);
            display: inline-block;
            width: 100%;
            padding-bottom: 10px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            margin-bottom: 25px;
            gap: 20px;
        }

        /* Animated Search Bar */
        #studentSearch {
            flex: 1;
            padding: 12px 20px;
            border: 2px solid #e3e6f0;
            border-radius: 30px;
            outline: none;
            transition: all 0.3s;
            font-size: 15px;
        }

        #studentSearch:focus {
            border-color: var(--primary);
            box-shadow: 0 0 10px rgba(78,115,223,0.2);
            width: 350px;
        }

        .btn-home {
            background: var(--dark);
            color: white;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 30px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-home:hover {
            background: #1a202e;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        }

        /* Stylish Table */
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        th {
            background: none;
            color: #858796;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            padding: 15px;
        }

        tr.searchable-row {
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.03);
            transition: all 0.2s;
        }

        tr.searchable-row:hover {
            transform: scale(1.01);
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            background: #fdfdfd;
        }

        td {
            padding: 20px 15px;
            border-top: 1px solid #f1f1f1;
            border-bottom: 1px solid #f1f1f1;
        }

        td:first-child { border-left: 1px solid #f1f1f1; border-radius: 10px 0 0 10px; }
        td:last-child { border-right: 1px solid #f1f1f1; border-radius: 0 10px 10px 0; }

        /* Status Badge for Quantity */
        .qty-badge {
            background: #eef2ff;
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 700;
        }

        /* Check Out Button */
        .btn-checkout {
            background: var(--success);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: 0.3s;
        }

        .btn-checkout:hover {
            background: #169b6b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(28,200,138,0.3);
        }
    </style>
</head>
<body>

    <div class="container">
        <h4>Lent Items Management</h4>

        <div class="top-bar">
            <input type="text" id="studentSearch" placeholder="🔍 Search student name, ID or item...">
            <a href="<?= URLROOT; ?>" class="btn-home">← Home</a>
        </div>

        <?php if(!empty($data)): ?>
            <table id="lentTable">
                <thead>
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Item Name</th>
                        <th>Qty</th>
                        <th>Lent Date</th>
                        <th style="text-align: center;">Actions</th>
                    </tr>
                </thead>
                <tbody id="lentData">
                    <?php foreach($data as $d): ?>
                        <tr class="searchable-row">
                            <td style="font-weight: 600; color: var(--primary);"><?= htmlspecialchars($d->student_id); ?></td>
                            <td><?= htmlspecialchars($d->student_name); ?></td>
                            <td><strong><?= htmlspecialchars($d->itemName); ?></strong></td>
                            <td><span class="qty-badge"><?= htmlspecialchars($d->quantity); ?></span></td>
                            <td style="color: #666; font-size: 13px;"><?= htmlspecialchars($d->lend_time); ?></td>
                            <td style="text-align: center;">
                                <a href="<?= URLROOT; ?>/Retrieve/checkout/<?= $d->id; ?>" 
                                   class="btn-checkout"
                                   onclick="return confirm('Ready to return this item to inventory?');">
                                   Return Item
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <div style="text-align: center; padding: 50px;">
                <p style="color: #999;">No records found. Everything is in stock!</p>
            </div>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#studentSearch").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#lentData tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</body>
</html>