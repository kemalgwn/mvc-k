<?php
if (session_status() === PHP_SESSION_NONE) session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Car Site</title>
    <link rel="stylesheet" href="/Mvc-k/public/css/style.css">
</head>
<body>

<nav>
    <div class="nav-left">
        <a href="/Mvc-k/public/index.php">Home</a>
        <a href="/Mvc-k/public/index.php?url=car/contact">Contact</a>
        <a href="/Mvc-k/public/index.php?url=car/buy">Buy</a>
        <a href="/Mvc-k/public/index.php?url=admin/index">Admin</a>
    </div>
    <div class="nav-right">
        <?php if (isset($_SESSION['user'])): ?>
            <span class="welcome-text">Welcome, <?= htmlspecialchars($_SESSION['user']['username']) ?></span>
            <a href="/Mvc-k/public/index.php?url=user/logout" class="logout-link">Logout</a>
        <?php else: ?>
            <a href="/Mvc-k/public/index.php?url=user/login">Login</a>
            <a href="/Mvc-k/public/index.php?url=user/register">Register</a>
        <?php endif; ?>
    </div>
</nav>
