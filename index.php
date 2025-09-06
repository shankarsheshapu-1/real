<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Hospital Bed Availability</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body class="bg-light">
<div class="container mt-5">
<h2 class="text-center mb-4">Hospital Bed Availability</h2>


<div class="row">
<?php
$stmt = $conn->query("SELECT * FROM beds");
while($row = $stmt->fetch_assoc()){
$available = $row['total_beds'] - $row['occupied_beds'];
echo "<div class='col-md-4'>
<div class='card mb-3'>
<div class='card-body text-center'>
<h5 class='card-title'>{$row['ward_type']}</h5>
<p class='mb-1'>Total Beds: <strong>{$row['total_beds']}</strong></p>
<p class='mb-1'>Occupied: <strong>{$row['occupied_beds']}</strong></p>
<p class='mb-0'>Available: <strong class='text-success'>$available</strong></p>
</div>
</div>
</div>";
}
?>
</div>


<div class="text-center mt-3">
<a href="login.php" class="btn btn-primary">Admin Login</a>
</div>
</div>
</body>
</html>s