<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

$id = intval($_GET['id']);
$result = $conn->query("SELECT * FROM beds WHERE id=$id");
$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hospital_name = $_POST['hospital_name'];
    $total_beds = intval($_POST['total_beds']);
    $available_beds = intval($_POST['available_beds']);

    $sql = "UPDATE beds SET hospital_name='$hospital_name', total_beds=$total_beds, available_beds=$available_beds WHERE id=$id";
    $conn->query($sql);
    header("Location: dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Hospital</title>
</head>
<body>
    <h2>Edit Hospital</h2>
    <form method="POST">
        <label>Hospital Name:</label><br>
        <input type="text" name="hospital_name" value="<?php echo $row['hospital_name']; ?>" required><br>
        <label>Total Beds:</label><br>
        <input type="number" name="total_beds" value="<?php echo $row['total_beds']; ?>" required><br>
        <label>Available Beds:</label><br>
        <input type="number" name="available_beds" value="<?php echo $row['available_beds']; ?>" required><br><br>
        <button type="submit">Update</button>
    </form>
    <br>
    <a href="dashboard.php">Back to Dashboard</a>
</body>
</html>