<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lent Items Manager</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php URLROOT; ?>/css/retrieve.css">
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