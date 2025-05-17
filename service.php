<?php
// service.php
include('header.php');
include('connection.php'); 

// Query to fetch services based on categories and providers
$query = "
    SELECT s.service_id, s.category, s.price, p.provider_id, p.name as provider_name, p.location
    FROM service s
    JOIN offers o ON s.service_id = o.service_id
    JOIN provider p ON o.provider_id = p.provider_id
    ORDER BY s.category, p.name
";

// Execute the query
$result = mysqli_query($conn, $query);

$services = [];
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F15B29; /* Light background for the entire page */
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .service-box {
            border: 1px solid #ddd;
            padding: 20px;
            margin: 20px;
            width: 250px;
            text-align: center;
            display: inline-block;
            vertical-align: top;
            background-color: #fff; /* White background for the service boxes */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
            border-radius: 8px; /* Rounded corners for the boxes */
        }

        /* Flexbox for better layout */
        .service-box button {
            background-color: #032642;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }

        .service-box button:hover {
            background-color: #F15B29;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    // Display all services in service boxes
    foreach ($services as $service) {
        echo "<div class='service-box'>";
        echo "<h4>" . $service['category'] . "</h4>";
        echo "<p>Price: $" . $service['price'] . "</p>";
        echo "<p>Provider: " . $service['provider_name'] . "</p>";
        echo "<p>Location: " . $service['location'] . "</p>";
        
        // Add hidden fields to pass the additional data to book_service.php
        echo "<form action='book_service.php' method='POST'>";
        echo "<input type='hidden' name='service_id' value='" . $service['service_id'] . "'>";
        echo "<input type='hidden' name='provider_id' value='" . $service['provider_id'] . "'>";
        echo "<input type='hidden' name='name' value='" . $service['provider_name'] . "'>"; // Service name
        echo "<input type='hidden' name='category' value='" . $service['category'] . "'>";  // Service category
        echo "<input type='hidden' name='price' value='" . $service['price'] . "'>";        // Price per service
        echo "<input type='hidden' name='duration' value='1'>";                             // Default duration (can be modified later)
        echo "<label for='quantity'>Quantity: </label>";
        echo "<input type='number' name='quantity' min='1' required>";
        echo "<button type='submit'>Book</button>";
        echo "</form>";
        echo "</div>";
    }
    ?>
</div>

</body>
</html>

<?php
include('footer.php');
?>





