<?php
include 'db.php';
$id = $_GET['id'];

$data = mysqli_fetch_assoc(
    mysqli_query($conn, "SELECT * FROM products WHERE id=$id")
);

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $buy = $_POST['buy'];
    $sell = $_POST['sell'];
    $display = $_POST['display'];

    mysqli_query($conn,
        "UPDATE products SET
        name='$name',
        buying_price='$buy',
        selling_price='$sell',
        display='$display'
        WHERE id=$id"
    );

    header("Location: index.php");
}
?>

<h2>EDIT PRODUCT</h2>

<form method="post">
Name: <input type="text" name="name" value="<?= $data['name'] ?>"><br><br>
Buying Price: <input type="number" name="buy" value="<?= $data['buying_price'] ?>"><br><br>
Selling Price: <input type="number" name="sell" value="<?= $data['selling_price'] ?>"><br><br>
Display:
<input type="checkbox" name="display" value="Yes" <?= $data['display']=='Yes'?'checked':'' ?>> Yes<br><br>
<input type="submit" name="update" value="SAVE">
</form>