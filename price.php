<?php
// price.php

include('header.php');
include('connection.php');

// Retrieve data from POST request
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$duration = $_POST['duration'];

// Calculate total price
$total_price = $price * $quantity;

// Save booking to database
$sql = "INSERT INTO book_service (category, quantity, duration, price, total_price) 
        VALUES ('$category', $quantity, $duration, $price, $total_price)";

if (mysqli_query($conn, $sql)) {
    echo "<p>Booking confirmed and saved to the database.</p>";
} else {
    echo "<p>Error saving booking: " . mysqli_error($conn) . "</p>";
}
?>

<div class="price-summary" style="border: 1px solid #ccc; padding: 20px; border-radius: 8px; width: 50%; margin: auto; background-color: #f9f9f9;">
    <h2 style="text-align: center;">Price Summary</h2>
    <p><strong>Service Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
    <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
    <p><strong>Duration:</strong> <?php echo htmlspecialchars($duration); ?> day(s)</p>
    <p><strong>Total Price:</strong> $<?php echo htmlspecialchars(number_format($total_price, 2)); ?></p>

    <!-- Initial Pay Now Button -->
    <form>
        <button type="button" id="pay-now-btn" class="btn">

            Pay Now ($<?php echo number_format($total_price, 2); ?>)
        </button>
    </form>

    <!-- Payment Methods -->
    <div id="payment-methods" style="display: none; text-align: center; margin-top: 20px;">
        <h3>Select Payment Method</h3>
        <button type="button" class="method-btn" data-method="Bkash" style="margin: 10px; padding: 10px 20px; background-color: #28a745; color: white; border: none; border-radius: 5px; cursor: pointer;">Bkash</button>
        <button type="button" class="method-btn" data-method="Nagad" style="margin: 10px; padding: 10px 20px; background-color: #17a2b8; color: white; border: none; border-radius: 5px; cursor: pointer;">Nagad</button>
        <button type="button" class="method-btn" data-method="Rocket" style="margin: 10px; padding: 10px 20px; background-color: #ffc107; color: white; border: none; border-radius: 5px; cursor: pointer;">Rocket</button>
    </div>

    <!-- Payment Input Form -->
    <form id="payment-form" action="process_payment.php" method="POST" style="display: none; margin-top: 20px; text-align: center;">
        <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
        <input type="hidden" name="method" id="payment-method">

        <div style="margin: 10px;">
            <input type="text" name="phone" placeholder="Enter Phone Number" style="padding: 8px; width: 60%;">
        </div>
        <div style="margin: 10px;">
            <input type="password" name="pin" placeholder="Enter PIN" style="padding: 8px; width: 60%;">
        </div>
        <button type="submit" class="btn">Confirm Payment</button>
    </form>

    <p style="text-align: center;">Thank you for booking with us!</p>
</div>

<!-- JavaScript to show payment options and input form -->
<script>
    document.getElementById('pay-now-btn').addEventListener('click', function () {
        document.getElementById('payment-methods').style.display = 'block';
    });

    const methodButtons = document.querySelectorAll('.method-btn');
    methodButtons.forEach(function (btn) {
        btn.addEventListener('click', function () {
            const method = this.getAttribute('data-method');
            document.getElementById('payment-method').value = method;
            document.getElementById('payment-form').style.display = 'block';
        });
    });
</script>

<style type="text/css">        .btn {
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
        }</style>

<?php include('footer.php'); ?>