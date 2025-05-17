<?php
session_start();
include('connection.php');
include('header.php');

if (!isset($_SESSION['provider_id'])) {
    echo "No user data found. Please log in again.";
    exit();
}

$provider_id = (int)$_SESSION['provider_id'];

// Fetch provider basic info
$query_provider = "SELECT * FROM provider WHERE provider_id = $provider_id";
$result_provider = mysqli_query($conn, $query_provider);
if (!$result_provider || mysqli_num_rows($result_provider) == 0) {
    echo "Provider not found. Please log in again.";
    exit();
}
$provider = mysqli_fetch_assoc($result_provider);

// Fetch services offered
$query_services = "
    SELECT s.category, s.price, s.description, s.availability 
    FROM offers o
    JOIN service s ON o.service_id = s.service_id
    WHERE o.provider_id = $provider_id
";
$result_services = mysqli_query($conn, $query_services);

// Fetch categories
$query_categories = "SELECT category FROM category WHERE provider_id = $provider_id";
$result_categories = mysqli_query($conn, $query_categories);

// Count total services done (bookings)
$query_services_done = "
    SELECT COUNT(*) AS total_services, IFNULL(SUM(b.total_price), 0) AS total_revenue
    FROM book_service b
    JOIN offers o ON b.service_id = o.service_id
    WHERE o.provider_id = $provider_id
";
$result_services_done = mysqli_query($conn, $query_services_done);
$stats = mysqli_fetch_assoc($result_services_done);

// Average rating
$query_avg_rating = "SELECT AVG(rating) AS avg_rating FROM feedback WHERE provider_id = $provider_id";
$result_rating = mysqli_query($conn, $query_avg_rating);
$row_rating = mysqli_fetch_assoc($result_rating);
$avg_rating = $row_rating['avg_rating'] ? number_format($row_rating['avg_rating'], 2) : 'No ratings';

// Recent feedback (last 5)
$query_feedback = "
    SELECT rating, feedback 
    FROM feedback 
    WHERE provider_id = $provider_id 
    ORDER BY feedback_id DESC 
    LIMIT 5
";
$result_feedback = mysqli_query($conn, $query_feedback);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>Provider Dashboard</title>
<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f7fa;
        margin: 20px;
    }
    .dashboard {
        max-width: 900px;
        margin: auto;
        background: #fff;
        border-radius: 8px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    h1, h2 {
        color: #032642;
    }
    .section {
        margin-bottom: 30px;
    }
    table {
        border-collapse: collapse;
        width: 100%;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: left;
    }
    th {
        background-color: #032642;
        color: white;
    }
    .stats {
        font-size: 1.1em;
    }
    .feedback-item {
        background: #e9f1f7;
        border-left: 5px solid #032642;
        padding: 15px;
        margin-bottom: 10px;
        border-radius: 4px;
    }
    .rating {
        color: #F15B29;
        font-weight: bold;
    }

    .logout-btn{
        background-color: #032642;
            color: white;
            border: none;
            padding: 10px;
            width: 97%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;

    }

         .logout-btn:hover {
            background-color: #F15B29;
        }
</style>
</head>
<body><div class="dashboard">
    <h1>Welcome, <?php echo htmlspecialchars($provider['name']); ?></h1>

    <div class="section">
        <h2>Basic Information</h2>
        <table>
            <tr><th>Name</th><td><?php echo htmlspecialchars($provider['name']); ?></td></tr>
            <tr><th>Location</th><td><?php echo htmlspecialchars($provider['location']); ?></td></tr>
            <tr><th>Gender</th><td><?php echo htmlspecialchars($provider['gender']); ?></td></tr>
            <tr><th>Present Address</th><td><?php echo nl2br(htmlspecialchars($provider['present_address'])); ?></td></tr>
            <tr><th>Permanent Address</th><td><?php echo nl2br(htmlspecialchars($provider['permanent_address'])); ?></td></tr>
            <tr><th>Email</th><td><?php echo htmlspecialchars($provider['email']); ?></td></tr>
            <tr><th>Phone</th><td><?php echo htmlspecialchars($provider['Phone']); ?></td></tr>
        </table>
    </div>

    <div class="section">
        <h2>Categories Offered</h2>
        <?php
        if (mysqli_num_rows($result_categories) > 0) {
            echo "<ul>";
            while ($cat = mysqli_fetch_assoc($result_categories)) {
                echo "<li>" . htmlspecialchars($cat['category']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No categories listed.</p>";
        }
        ?>
    </div>

    <div class="section">
        <h2>Services Offered</h2>
        <?php if (mysqli_num_rows($result_services) > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Category</th>
                    <th>Price (USD)</th>
                    <th>Description</th>
                    <th>Availability</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($service = mysqli_fetch_assoc($result_services)): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['category']); ?></td>
                    <td><?php echo number_format($service['price'], 2); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><?php echo htmlspecialchars($service['availability']); ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php else: ?>
            <p>No services offered yet.</p>
        <?php endif; ?>
    </div>

    <div class="section stats">
        <h2>Performance Stats</h2>
        <p><strong>Total Services Done:</strong> <?php echo $stats['total_services']; ?></p>
        <p><strong>Total Revenue Earned:</strong> $<?php echo number_format($stats['total_revenue'], 2); ?></p>
        <p><strong>Average Rating:</strong> <?php echo $avg_rating == 'No ratings' ? $avg_rating : $avg_rating . " / 5"; ?></p>
    </div>

    <div class="section">
        <h2>Recent Feedback</h2>
        <?php 
        if (mysqli_num_rows($result_feedback) > 0) {
            while ($fb = mysqli_fetch_assoc($result_feedback)) {
                echo '<div class="feedback-item">';
                echo '<span class="rating">Rating: ' . htmlspecialchars($fb['rating']) . ' / 5</span><br>';
                echo '<p>' . nl2br(htmlspecialchars($fb['feedback'])) . '</p>';
                echo '</div>';
            }
        } else {
            echo "<p>No feedback available.</p>";
        }
        ?>
    </div>

        <!-- Logout Button -->
        <form action="logout.php" method="post" style="text-align:center;">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
</div>

</body>
</html>
<style>
    body {
        background-image: url('img/bg.png');
    }
</style>


<?php
include('footer.php');
?>