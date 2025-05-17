<?php
// book_service.php
include('header.php');

// Retrieve data from POST request
$name = $_POST['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$duration = $_POST['duration'];

// Calculate total price
$total_price = $price * $quantity;
?>

<div class="booking-summary">
    <h2>Booking Summary</h2>
    <p><strong>Service Name:</strong> <?php echo htmlspecialchars($name); ?></p>
    <p><strong>Category:</strong> <?php echo htmlspecialchars($category); ?></p>
    <p><strong>Price per Unit:</strong> $<?php echo htmlspecialchars($price); ?></p>
    <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
    <p><strong>Duration:</strong> <?php echo htmlspecialchars($duration); ?> day(s)</p>
    <p><strong>Total Price:</strong> $<?php echo htmlspecialchars($total_price); ?></p>

    <!-- Buttons for Confirm and Cancel -->
    <form action="price.php" method="post">
        <input type="hidden" name="name" value="<?php echo htmlspecialchars($name); ?>">
        <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($price); ?>">
        <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
        <input type="hidden" name="duration" value="<?php echo htmlspecialchars($duration); ?>">
        <input type="hidden" name="total_price" value="<?php echo htmlspecialchars($total_price); ?>">
        <button type="submit" name="confirm" class="confirm-btn">Confirm Booking</button>
    </form>
    <form action="search_results.php" method="get">
        <button type="submit" class="cancel-btn">Cancel Booking</button>
    </form>
</div>

<?php
include('footer.php');
?>

<!-- Add some CSS -->
<style>
    .booking-summary {
        margin: 20px auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        max-width: 500px;
    }
    .booking-summary p {
        margin: 10px 0;
    }
    
    .confirm-btn {
        background-color: #4CAF50;
        color: white;
           padding: 10px 10px;
        margin-top: 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
    .cancel-btn {
        background-color: #f44336;
        color: white;
           padding: 10px 10px;
        margin-top: 20px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }
</style>