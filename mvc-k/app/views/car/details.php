<?php require '../app/views/templates/header.php'; ?>

<div class="car-details-container">
    <a href="/Mvc-k/public/index.php" class="btn-back">&larr; Back to Listings</a>
    <div class="car-details-card">
        <img src="/Mvc-k/public/<?= htmlspecialchars($data['car']->image) ?>" alt="<?= htmlspecialchars($data['car']->name) ?>">
        <div class="car-details-info">
            <h1><?= htmlspecialchars($data['car']->name) ?></h1>
            <h2 class="price">$<?= number_format($data['car']->price, 2) ?></h2>
            <p><strong>Category:</strong> <?= htmlspecialchars($data['car']->category) ?></p>

            <h3>Description</h3>
            <p><?= nl2br(htmlspecialchars($data['car']->specs)) ?></p>

            <h3>Features</h3>
            <ul>
                <li>Engine: V8 Turbocharged</li>
                <li>Transmission: 6-speed manual</li>
                <li>Fuel Type: Gasoline</li>
                <li>Seats: 2</li>
                <li>Color: Red</li>
            </ul>

            <a href="/Mvc-k/public/index.php?url=car/buy/<?= $data['car']->id ?>" class="btn-buy">Buy Now</a>
        </div>
    </div>
</div>

<?php require '../app/views/templates/footer.php'; ?>
