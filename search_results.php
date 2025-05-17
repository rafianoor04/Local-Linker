<?php
include('header.php');
include('connection.php');

// Get parameters
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$location = isset($_GET['location']) ? trim($_GET['location']) : '';
$price = isset($_GET['price']) ? floatval($_GET['price']) : null;

$category_clean = strtolower($category);
?>

<div class="search-results">
    <h2>Search for <b><?php echo htmlspecialchars($category); ?></b> Services</h2>

    <!-- 📝 Search Form -->
    <form method="GET" action="search_results.php" class="filter-form">
        <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
        <label for="location">Location:</label>
        <input type="text" name="location" placeholder="Enter location" required value="<?php echo htmlspecialchars($location); ?>">
        <label for="price">Max Price:</label>
        <input type="number" name="price" placeholder="Enter max price" required value="<?php echo htmlspecialchars($_GET['price'] ?? ''); ?>">
        <button type="submit">Search</button>
    </form>

    <br><hr><br>

<?php
// ✅ Only show results if both location and price are filled
if (!empty($category) && !empty($location) && $price !== null) {

    $sql = "SELECT sp.name, s.category, s.price, s.description, s.availability, sp.location
            FROM provider sp
            JOIN offers o ON sp.provider_id = o.provider_id
            JOIN service s ON o.service_id = s.service_id
            WHERE LOWER(TRIM(s.category)) = '$category_clean'
            AND sp.location LIKE '%$location%'
            AND s.price <= $price";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='service-item'>";
            echo "<h4>" . htmlspecialchars($row['name']) . " - " . htmlspecialchars($row['category']) . "</h4>";
            echo "<p><strong>Location:</strong> " . htmlspecialchars($row['location']) . "</p>";
            echo "<p>" . htmlspecialchars($row['description']) . "</p>";
            echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";

            if ($row['availability'] > 0) {
                echo "<form action='book_service.php' method='POST' class='booking-form'>";
                echo "<input type='hidden' name='name' value='" . htmlspecialchars($row['name']) . "'>";
                echo "<input type='hidden' name='category' value='" . htmlspecialchars($row['category']) . "'>";
                echo "<input type='hidden' name='price' value='" . htmlspecialchars($row['price']) . "'>";
                echo "<label for='quantity'>Quantity:</label>";
                echo "<input type='number' name='quantity' min='1' max='10' value='1'>";
                echo "<label for='duration'>Duration (days):</label>";
                echo "<input type='number' name='duration' min='1' max='30' value='1'>";
                echo "<button type='submit' class='book-btn'>Book</button>";
                echo "</form>";
            } else {
                echo "<p class='not-available'>This service is currently unavailable.</p>";
            }

            echo "</div>";
        }
    } else {
        echo "<p>No services found matching your criteria.</p>";
    }
}
?>

</div>

<!-- Styling -->
<style>
    .search-results h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    .filter-form {
        text-align: center;
        margin-bottom: 30px;
    }

    .filter-form input {
        padding: 8px;
        margin: 5px;
        width: 180px;
    }

    .filter-form button {
        padding: 8px 15px;
        background-color: #032642;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .filter-form button:hover {
        background-color: #F15B29;
    }

    .service-item {
        border: 1px solid #ccc;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }

    .book-btn {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .book-btn:hover {
        background-color: #45a049;
    }

    .not-available {
        color: red;
        font-weight: bold;
    }
</style>
