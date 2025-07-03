<?php require '../app/views/templates/header.php'; ?>


<?php if (!empty($data['error'])): ?>
    <div class="error-message">
        <?= htmlspecialchars($data['error']) ?>
    </div>
<?php endif; ?>

<h1>Login</h1>
<form method="POST" action="/Mvc-k/public/index.php?url=user/login">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>

    <label for="password">Password</label>
    <input type="password" name="password" id="password" required>

    <button type="submit">Login</button>
</form>

<?php require '../app/views/templates/footer.php'; ?>
<style>
    .error-message {
        background-color: #ffdddd;
        border: 1px solid #cc0000;
        color: #cc0000;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
    }
</style>