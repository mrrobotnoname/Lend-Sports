<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LentSports Login</title>
    <link rel="stylesheet" href="<?php URLROOT; ?>/css/login.css">
</head>
<body>
    <div class="login-card">
        <h2>Lend-Sports Login</h2>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr>
                    <td></td>
                    <td><button type="submit" class="btn-login">Sign In to Dashboard</button></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>