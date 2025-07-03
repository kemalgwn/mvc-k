<h2>Admin Dashboard</h2>
<p>Welcome, <?= htmlspecialchars($user['username']) ?>!</p>

<h3>Registered Users</h3>
<table border="1" cellpadding="10">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Admin?</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($users as $registeredUser): ?>
        <tr>
            <td><?= $registeredUser['id'] ?></td>
            <td><?= htmlspecialchars($registeredUser['username']) ?></td>
            <td><?= htmlspecialchars($registeredUser['email']) ?></td>
            <td><?= $registeredUser['is_admin'] ? 'Yes' : 'No' ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
