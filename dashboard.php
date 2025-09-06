<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM beds WHERE id=$id");
    header("Location: dashboard.php");
    exit();
}

// Fetch all beds
$result = $conn->query("SELECT * FROM beds ORDER BY updated_at DESC");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            padding: 10px;
            border: 1px solid black;
            text-align: center;
        }
        th {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h2>
    <p><a href="logout.php">Logout</a> | <a href="add_bed.php">Add New Hospital</a></p>

    <h3>Hospital Bed Availability</h3>
    <table>
        <tr>
            <th>ID</th>
            <th>Hospital Name</th>
            <th>Total Beds</th>
            <th>Available Beds</th>
            <th>Last Updated</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo htmlspecialchars($row['hospital_name']); ?></td>
                <td><?php echo $row['total_beds']; ?></td>
                <td><?php echo $row['available_beds']; ?></td>
                <td><?php echo $row['updated_at']; ?></td>
                <td>
                    <a href="edit_bed.php?id=<?php echo $row['id']; ?>">Edit</a> | 
                    <a href="dashboard.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete this record?')">Delete</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
