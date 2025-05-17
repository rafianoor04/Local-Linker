
<?php
session_start();

include('connection.php'); 


$success = "";
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT admin_id, username, password FROM admin WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Use this if passwords are stored as plain text (NOT recommended for production)
        if ($password === $row['password']) {
            $_SESSION["admin_logged_in"] = true;
            $_SESSION["admin_id"] = $row['admin_id'];
            $_SESSION["admin_username"] = $row['username'];
            $success = "Login successful! Redirecting...";
            echo "<script>setTimeout(function(){ window.location.href = 'admin.php'; }, 2000);</script>";
        } else {
            $error = "Invalid email or password!";
        }

        // Use this instead if passwords are hashed (recommended):
        // if (password_verify($password, $row['password'])) { ... }

    } else {
        $error = "Invalid email or password!";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            background-image: url('img/bg.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background: white;
            padding: 20px;
            border-radius: 28px;
            box-shadow: 0px 0px 12px rgba(0, 0, 0, 0.1);
            width: 320px;
            text-align: center;
        }
        .login-container h2 {
            margin-bottom: 20px;
            color: #032642;
        }
        .input-group {
            margin-bottom: 15px;
        }
        .input-group input {
            width: 90%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            background-color: #032642;
            color: white;
            border: none;
            padding: 10px;
            width: 97%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .btn:hover {
            background-color: #F15B29;
        }
        .error {
            color: red;
            margin-bottom: 10px;
        }
        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (!empty($error)) { echo "<p class='error'>$error</p>"; } ?>
        <?php if (!empty($success)) { echo "<p class='success'>$success</p>"; } ?>
        <form method="POST" action="">
            <div class="input-group">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
    </div>
</body>
</html>

<style>
    body {
        background-image: url('img/bg.png');
    }
</style>