<?php require '../app/views/templates/header.php'; ?>

<div class="form-container">
    <h1>Register</h1>

    <?php if (!empty($data['error'])): ?>
        <div class="error"><?= htmlspecialchars($data['error']) ?></div>
    <?php endif; ?>

    <form method="POST" action="/Mvc-k/public/index.php?url=user/register">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Register</button>
    </form>
</div>

<?php require '../app/views/templates/footer.php'; ?>
