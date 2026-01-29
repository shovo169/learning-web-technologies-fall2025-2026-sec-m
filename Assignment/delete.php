<?php
include 'db.php';
$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE id=$id")
);

if (isset($_POST['delete'])) {
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: index.php");
}
?>

<h2>DELETE PRODUCT</h2>

Name: <?= $data['name'] ?><br>
Buying Price: <?= $data['buying_price'] ?><br>
Selling Price: <?= $data['selling_price'] ?><br>
Displayable: <?= $data['display'] ?><br><br>

<form method="post">
    <input type="submit" name="delete" value="Delete">
</form>