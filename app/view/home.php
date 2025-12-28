<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lent-Sports</title>
</head>
<body>
    <h3><center>Wellcome to the Lent-Sports!</center></h3>
    <br><br>

    <a href="<?php echo URLROOT;?>/lent">Lent a Sport item</a><br><br>
    <a href="<?php echo URLROOT;?>/edit-item">Edit Sport items</a><br>


    <table>
        <thead>
            <tr>
                <th>Item ID</th>
                <th>Item</th>
                <th>Qantity</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data as $d): ?>
                <tr>
                    <td><?php echo htmlspecialchars($d->id)?></td>
                    <td><?php echo htmlspecialchars($d->itemName)?></td>
                    <td><?php echo htmlspecialchars($d->quantity)?></td>
                </tr>
                <?php endforeach ?>
        </tbody>
    </table>

</body>
</html>