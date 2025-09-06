<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospital_name = $_POST['hospital_name'];
    $total_beds = intval($_POST['total_beds']);
    $available_beds = intval($_POST['available_beds']);

    $sql = "INSERT INTO beds (hospital_name, total_beds, available_beds) 
            VALUES ('$hospital_name', $total_beds, $available_beds)";
    $conn->query($sql);
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Add Hospital</title>
</head>
<body>
    <h2>Add New Hospital</h2>
    <form method="POST">
        <label>Hospital Name:</label><br>
        <input type="text" name="hospital_name" required><br>
        <label>Total Beds:</label><br>
        <input type="number" name="total_beds" required><br>
        <label>Available Beds:</label><br>
        <input type="number" name="available_beds" required><br><br>
        <button type="submit">Add</button>
    </form>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>