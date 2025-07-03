<h2>Admin Dashboard</h2>
<link rel="stylesheet" href="/Mvc-k/public/css/admin.css">
<p>Welcome, <?= htmlspecialchars($user['username']) ?>!</p>

<h3>Registered Users</h3>
<table border="1" cellpadding="10">
    <thead>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Email</th>
        <th>Admin?</th>
        <th>Warnings</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($users)): ?>
        <?php foreach ($users as $registeredUser): ?>
            <tr>
                <td><?= $registeredUser->id ?></td>
                <td><?= htmlspecialchars($registeredUser->username) ?></td>
                <td><?= htmlspecialchars($registeredUser->email) ?></td>
                <td><?= $registeredUser->is_admin ? 'Yes' : 'No' ?></td>
                <td><?= $registeredUser->warnings ?? 0 ?></td>
                <td>
                    <?php if ($registeredUser->id): ?>
                        <form method="post" action="/Mvc-k/public/index.php?url=admin/deleteUser" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?= $registeredUser->id ?>">
                            <button type="submit" onclick="return confirm('Delete this user?');">Delete</button>
                        </form>
                        <form method="post" action="/Mvc-k/public/index.php?url=admin/warnUser" style="display:inline;">
                            <input type="hidden" name="user_id" value="<?= $registeredUser->id ?>">
                            <button type="submit">Warn</button>
                        </form>
                    <?php else: ?>
                        <em>--</em>
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="6">No users found.</td></tr>
    <?php endif; ?>
    </tbody>
</table>
