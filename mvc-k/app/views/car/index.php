<?php require '../app/views/templates/header.php'; ?>

<h1>Cars for Sale</h1>

<form method="GET" class="filter-form">
    <input type="text" name="search" placeholder="Search cars..." value="<?= htmlspecialchars($data['searchTerm'] ?? '') ?>">
    <select name="category">
        <option value="">All Categories</option>
        <?php foreach ($data['categories'] as $cat): ?>
            <option value="<?= htmlspecialchars($cat) ?>" <?= (isset($data['selectedCategory']) && $data['selectedCategory'] === $cat) ? 'selected' : '' ?>>
                <?= htmlspecialchars($cat) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button type="submit">Filter</button>
</form>

</form>

<div class="car-grid">
    <?php if (!empty($data['cars'])): ?>
        <?php foreach ($data['cars'] as $car): ?>
            <div class="car-card">
                <img src="/Mvc-k/public/<?= htmlspecialchars($car->image) ?>" alt="<?= htmlspecialchars($car->name) ?>">
                <h2><?= htmlspecialchars($car->name) ?></h2>
                <p class="price">$<?= number_format($car->price, 2) ?></p>
                <a href="/Mvc-k/public/index.php?url=car/details/<?= $car->id ?>" class="btn">View Details</a>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No cars found matching your criteria.</p>
    <?php endif; ?>
</div>

<?php require '../app/views/templates/footer.php'; ?>
