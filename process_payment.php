
<?php
include('header.php');
include('connection.php'); // Ensure this connects to your database

// Check if the payment method was selected
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the total price from the previous form
    $total_price = $_POST['total_price'];
    $method = isset($_POST['method']) ? htmlspecialchars($_POST['method']) : '';

    if ($method) {
        // Save the payment method and status to the database
        $sql = "INSERT INTO payment_transactions (total_price, method, status) VALUES ('$total_price', '$method', 'Success')";
        
        if (mysqli_query($conn, $sql)) {
            echo "<div class='payment-success'>";
            echo "<h2>Payment Successful</h2>";
            echo "<p>Your payment of <strong>$" . number_format($total_price, 2) . "</strong> has been successfully processed through <strong>$method</strong>.</p>";
            echo "</div>";
        } else {
            echo "<p>Error saving payment data: " . mysqli_error($conn) . "</p>";
        }
    } else {
        echo "<p>Error: No payment method selected.</p>";
    }
} else {
    // If the request is not POST, show the payment method options (in case of invalid request)
    echo "<p>Error: Invalid request method.</p>";
}

?>

<!-- Payment Success Styling -->
<style>
    .payment-success {
        border: 1px solid #28a745;
        padding: 20px;
        border-radius: 8px;
        width: 50%;
        margin: 50px auto;
        background-color: #eaffea;
        text-align: center;
    }

    .payment-methods {
        display: none;
        text-align: center;
        margin-top: 20px;
    }
</style>

<?php
include('footer.php');
?>