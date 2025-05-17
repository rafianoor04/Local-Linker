
<?php
session_start();
include('connection.php');
include('header.php');

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_service'])) {
    $category = $_POST['category'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $availability = $_POST['availability'];

    $stmt = $conn->prepare("INSERT INTO service (category, price, description, availability) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $category, $price, $description, $availability);

    if ($stmt->execute()) {
        $message = "Service added successfully!";
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
    .add-btn {
     
            background-color: #032642;
            color: white;
            border: none;
            padding: 10px;
            width: 97%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;

    }
         
        .add-btn:hover {
            background-color: #F15B29;
        }
    .button-group {
        margin-top: 20px;
        text-align: center;  /* Center the buttons horizontally */
    }
    .button-group a button {
        margin: 0 10px; /* space between buttons */
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
    .back-btn {
        background-color: #007bff;
        color: white;
        padding: 10px 20px;
        border: none;
        font-weight: bold;
        cursor: pointer;
        border-radius: 8px;
    }
      h3{text-align: center; 
    margin-top: 40px; 
    font-size: 28px; 
    font-weight: 700; 
    color: #032642; 
    position: relative; 
    display: inline-block;
    padding-bottom: 8px;
    border-bottom: 3px solid #F15B29;
    letter-spacing: 1.2px;}
</style>

<div class="form-container">
    <h3>Add New Service</h3>
    <?php if (!empty($message)) echo "<p style='color:green; font-weight:bold;'>$message</p>"; ?>
    <form method="POST">
        <input type="hidden" name="add_service" class="adds" value="1">
        <label>Category:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Price:</label><br>
        <input type="number" name="price" required><br><br>

        <label>Description:</label><br>
        <textarea name="description" rows="4" cols="50" required></textarea><br><br>

        <label>Availability:</label><br>
        <select name="availability" required>
            <option value="Available">Available</option>
            <option value="Unavailable">Unavailable</option>
        </select><br><br>

        <button type="submit" class="add-btn">Submit</button>
    </form>

    <div class="button-group">
        <a href="remove_service.php"><button class="remove-btn" type="button">Remove Service</button></a>
        <a href="admin.php"><button class="back-btn" type="button">Back to Admin Panel</button></a>
    </div>
</div>

<?php include('footer.php'); ?>
