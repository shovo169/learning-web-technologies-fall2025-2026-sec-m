<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Display</title>
</head>
<body>

<h2>DISPLAY</h2>

<h3>Search Product</h3>
<input type="text"
       placeholder="Search product by name"
       onkeyup="searchProduct(this.value)">

<br><br>

<div id="result"></div>

<hr>

<table border="1" cellpadding="10">
<tr>
    <th>Name</th>
    <th>Profit</th>
    <th>Action</th>
</tr>

<?php
$sql = "SELECT * FROM products WHERE display='Yes'";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    $profit = $row['selling_price'] - $row['buying_price'];

    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$profit."</td>";
    echo "<td>
            <a href='edit.php?id=".$row['id']."'>edit</a> |
            <a href='delete.php?id=".$row['id']."'>delete</a>
          </td>";
    echo "</tr>";
}
?>
</table>

<script>
function searchProduct(value) {

    if (value === "") {
        document.getElementById("result").innerHTML = "";
        return;
    }

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "search.php?q=" + value, true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            document.getElementById("result").innerHTML = xhr.responseText;
        }
    };

    xhr.send();
}
</script>

</body>
</html>