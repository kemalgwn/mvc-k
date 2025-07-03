<?php require '../app/views/templates/header.php'; ?>

<h1>Contact Us</h1>

<form method="POST" action="">
    <label for="name">Name</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="message">Message</label><br>
    <textarea id="message" name="message" rows="5" required></textarea><br>

    <button type="submit">Send</button>
</form>

<?php require '../app/views/templates/footer.php'; ?>
