
<!DOCTYPE html>
<html>
<head>
    <title>Product Listing with Search</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<div class="p-3 mb-2 bg-primary-subtle text-primary-emphasis">

<center>
<h1>Product Listing</h1><br>

<form method="GET" action="">
    <input type="text" name="search" placeholder="Search products" value="<?php echo htmlspecialchars($_GET['search'] ?? '', ENT_QUOTES); ?>">
    <button type="button" class="btn btn-primary">Search</button>
</form>
</center>
<br><br>

<ul class="list-group">
  <li class="list-group-item">

<?php
include 'db.php';

$search = $_GET['search'] ?? '';
$search = $conn->real_escape_string($search);

$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
        echo "<ul><li> - Id: " . htmlspecialchars($row['id'], ENT_QUOTES) . " - Name: " . htmlspecialchars($row['name'], ENT_QUOTES) . " - Price: $" . htmlspecialchars($row['price'], ENT_QUOTES) . " - Category: " . htmlspecialchars($row['category'], ENT_QUOTES) .  "</li></ul><br>";
    }
    echo "</ul>";
} else {
    echo "No results found.";
}

$conn->close();
?>

</li>
</ul>

</div>

</body>
</html>