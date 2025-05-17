
<?php
session_start();
include('connection.php');
include('header.php');

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['remove_service'])) {
    $service_id = $_POST['service_id'];

    $stmt = $conn->prepare("DELETE FROM service WHERE service_id = ?");
    $stmt->bind_param("i", $service_id);

    if ($stmt->execute()) {
        $message = "Service removed successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<style>
    .form-container {
        padding: 20px;
        background-color: #f4f4f4;
        margin: 30px auto;
        width: 50%;
        border-radius: 10px;
    }
    .form-container h3 {
        margin-bottom: 20px;
    }
    .remove-btn {
        background-color: #dc3545;
        color: white;
        padding: 10px 20px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
    }
    .button-group {
        margin-top: 20px;
        text-align: center; /* center buttons horizontally */
    }
    .button-group a button {
        margin: 0 10px; /* space between buttons */
    }
    .add-btn {
        background-color: #28a745;
        color: white;
        padding: 10px 20px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
    }
    .back-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
    }
</style>

<div class="form-container">
    <h3>Remove Service</h3>
    <?php if (!empty($message)) echo "<p style='color:green; font-weight:bold;'>$message</p>"; ?>
    <form method="POST">
        <input type="hidden" name="remove_service" value="1">
        <label>Service ID:</label><br>
        <input type="number" name="service_id" required><br><br>
        <button type="submit" class="remove-btn">Remove</button>
    </form>

    <div class="button-group">
        <a href="add_service.php"><button class="add-btn" type="button">Add Service</button></a>
        <a href="admin.php"><button class="back-btn" type="button">Back to Admin Panel</button></a>
    </div>
</div>

<?php include('footer.php'); ?>
