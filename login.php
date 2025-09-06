<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <style>
        /* Full-page background color */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;  /* horizontal center */
            align-items: center;      /* vertical center */
            background: #f0f2f5;     /* light gray background */
        }

        /* Login form container */
        .login-container {
            background: #ffffff;      /* white form background */
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            text-align: center;
            width: 300px;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background: #0056b3;
        }

        p.error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Admin Login</h2>
    <form method="POST" action="">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
    <?php
    // Show error message if login failed
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $hashedPassword = md5($password);

        $sql = "SELECT * FROM admins WHERE username='$username' AND password='$hashedPassword'";
        $result = $conn->query($sql);

        if (!($result && $result->num_rows > 0)) {
            echo "<p class='error'>❌ Invalid username or password</p>";
        }
    }
    ?>
</div>

</body>
</html>
