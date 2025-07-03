<?php require '../app/views/templates/header.php'; ?>
<h1>Add a Car</h1>
<form method="POST" enctype="multipart/form-data">
    <input name="name" placeholder="Car Name"><br>
    <input name="price" placeholder="Price"><br>
    <input name="category" placeholder="Category"><br>
    <textarea name="specs" placeholder="Specifications"></textarea><br>
    <input type="file" name="image"><br>
    <button type="submit">Add Car</button>
</form>
<?php require '../app/views/templates/footer.php'; ?>
