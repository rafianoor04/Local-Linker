
<?php
include('header.php');
include('connection.php');
session_start();

$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    // -------------------- USER LOGIN --------------------
    $query_user = "SELECT password FROM user WHERE email = '$email'";
    $result_user = mysqli_query($conn, $query_user);

    if ($result_user && mysqli_num_rows($result_user) > 0) {
        $row = mysqli_fetch_assoc($result_user);
        $stored_password = $row['password'];

        if (password_verify($password, $stored_password)) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'user';
            header('Location: cprof.php');
            exit();
        } elseif ($password === $stored_password) {
            $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_query($conn, "UPDATE user SET password = '$new_hashed_password' WHERE email = '$email'");

            $_SESSION['email'] = $email;
            $_SESSION['role'] = 'user';
            header('Location: cprof.php');
            exit();
        } else {
            $message = "<div style='background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px;'>Invalid password.</div>";
        }

    } else {
     // -------------------- PROVIDER LOGIN --------------------
        $query_provider = "SELECT provider_id, password FROM provider WHERE email = '$email'";
        $result_provider = mysqli_query($conn, $query_provider);

        if ($result_provider && mysqli_num_rows($result_provider) > 0) {
            $row = mysqli_fetch_assoc($result_provider);
            $stored_password = $row['password'];
            $provider_id = $row['provider_id'];

            if (password_verify($password, $stored_password)) {
                $_SESSION['email'] = $email;
                $_SESSION['provider_id'] = $provider_id;
                $_SESSION['role'] = 'provider';
                header('Location: provider_dashboard.php'); // Redirect here
                exit();
            } elseif ($password === $stored_password) {
                $new_hashed_password = password_hash($password, PASSWORD_DEFAULT);
                mysqli_query($conn, "UPDATE provider SET password = '$new_hashed_password' WHERE email = '$email'");

                $_SESSION['email'] = $email;
                $_SESSION['provider_id'] = $provider_id;
                $_SESSION['role'] = 'provider';
                header('Location: provider_dashboard.php');
                exit();
            } else {
                $message = "<div style='background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px;'>Invalid password.</div>";
            }
        } else {
            $message = "<div style='background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px;'>Invalid email or password.</div>";
        }
    }
}
?>

<h2>Login</h2>

<?php echo $message; ?>

<form action="login.php" method="POST">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <button type="submit" class="btn">Login</button>
</form>

<style type="text/css">
    form {
        width: 20%;
    }
    .btn {
        background-color: #032642;
        color: white;
        padding: 10px 15px;
        border: none;
        cursor: pointer;
    }
    .btn:hover {
        background-color: #F15B29;
    }
    label {
        display: block;
        margin-top: 10px;
    }
    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
    }
</style>