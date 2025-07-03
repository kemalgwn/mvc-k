<h2>Cars Available</h2>
<ul>
<?php foreach ($data['cars'] as $car): ?>
    <li>
        <a href="/CarController/show/<?= $car['id'] ?>">
            <?= htmlspecialchars($car['brand']) ?> - <?= htmlspecialchars($car['model']) ?>
        </a>
    </li>
<?php endforeach; ?>
</ul>
