
<?php
session_start();
include('header.php');
include('connection.php');

if (!isset($_SESSION['email'])) {
    header('Location: login.php');
    exit();
}

$email = $_SESSION['email'];

// Fetch user details
$user_query = "SELECT * FROM user WHERE email = ?";
$stmt = $conn->prepare($user_query);
$stmt->bind_param("s", $email);
$stmt->execute();
$user_result = $stmt->get_result();

if ($user_result && $user_result->num_rows > 0) {
    $user = $user_result->fetch_assoc();
    $user_id = $user['user_id'];

    // Fetch booked services
    $services_query = "SELECT booking_id, service_id, category, quantity, duration, price, total_price, booking_date FROM book_service WHERE user_id = ?";
    $stmt2 = $conn->prepare($services_query);
    $stmt2->bind_param("i", $user_id);
    $stmt2->execute();
    $services_result = $stmt2->get_result();
} else {
    echo "<div class='error-message'>No user data found. Please log in again.</div>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Customer Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0; padding: 0;
            background-color: #f4f4f9;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        .profile-details, .booked-services {
            margin-bottom: 20px;
        }
        .profile-details h3, .booked-services h3 {
            color: #555;
            border-bottom: 2px solid #ddd;
            padding-bottom: 5px;
        }
        .profile-details p, .booked-services p {
            color: #666;
            margin: 10px 0;
        }
        .booked-services table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .booked-services table th, .booked-services table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        .booked-services table th {
            background-color: #f4f4f9;
            color: #333;
        }
        .booked-services table tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .error-message {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
        }
        .logout-btn {
            display: block;
            width: 120px;
            margin: 30px auto 0;
            padding: 10px 15px;
            background-color: #032642;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
        }
        .logout-btn:hover {
           background-color: #F15B29;
        }

    </style>
</head>
<body>
    <div class="container">
        <h2>Customer Profile</h2>

        <div class="profile-details">
            <h3>Profile Details</h3>
            <p><strong>Name:</strong> <?php echo htmlspecialchars($user['name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <p><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
            <p><strong>Address:</strong> 
                <?php 
                echo htmlspecialchars($user['street'] . ', ' . $user['city'] . ', ' . $user['state'] . ' - ' . $user['zipcode']); 
                ?>
            </p>
        </div>

        <div class="booked-services">
            <h3>Booked Services</h3>
            <?php if ($services_result && $services_result->num_rows > 0): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Booking ID</th>
                            <th>Service ID</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Duration</th>
                            <th>Price</th>
                            <th>Total Price</th>
                            <th>Booking Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($service = $services_result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($service['booking_id']); ?></td>
                                <td><?php echo htmlspecialchars($service['service_id']); ?></td>
                                <td><?php echo htmlspecialchars($service['category']); ?></td>
                                <td><?php echo htmlspecialchars($service['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($service['duration']); ?></td>
                                <td>$<?php echo htmlspecialchars($service['price']); ?></td>
                                <td>$<?php echo htmlspecialchars($service['total_price']); ?></td>
                                <td><?php echo htmlspecialchars($service['booking_date']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No services booked yet.</p>
            <?php endif; ?>
        </div>

        <!-- Logout Button -->
        <form action="logout.php" method="post" style="text-align:center;">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    </div>
</body>
</html>