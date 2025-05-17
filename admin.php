
<?php
session_start();
include('connection.php');
include('header.php');

if (!isset($_SESSION["admin_logged_in"])) {
    header("Location: admin_login.php");
    exit();
}

// Fetch provider information with service count and average rating
$providers = $conn->query("SELECT p.*, 
    COUNT(f.feedback_id) AS total_services, 
    ROUND(AVG(f.rating), 2) AS average_rating 
    FROM provider p 
    LEFT JOIN feedback f ON p.provider_id = f.provider_id 
    GROUP BY p.provider_id");

// Fetch user information with booked services count (corrected booking_id)
$users = $conn->query("SELECT u.*, 
    COUNT(b.booking_id) AS total_booked_services 
    FROM user u 
    LEFT JOIN book_service b ON u.user_id = b.user_id 
    GROUP BY u.user_id");
?>

<style>
    .admin-header {
        background-color: #032642;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 24px;
        font-weight: bold;
        border-bottom: 4px solid #F15B29;
    }
    .container {
        padding: 20px;
    }
    .button-group button {
        margin: 10px;
        padding: 10px 20px;
        border-radius: 8px;
        font-size: 16px;
        border: none;
        cursor: pointer;
        font-weight: bold;
    }
    .add-btn { background-color: #28a745; color: white; }
    .remove-btn { background-color: #dc3545; color: white; }
    
    /* Provider and User card styles */
    .provider-cards, .user-cards {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        justify-content: center;
        margin-top: 20px;
    }
    .provider-card, .user-card {
        background: white;
        border: 1px solid #ccc;
        border-radius: 12px;
        padding: 20px;
        width: 280px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: transform 0.2s ease;
        text-align: center;
    }
    .provider-card:hover, .user-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.15);
    }
    .provider-card h4, .user-card h4 {
        margin: 0 0 10px;
        color: #032642; /* Original dark blue */
    }
    .provider-info, .user-info {
        font-size: 14px;
        margin-bottom: 6px;
    }
    /* Color for email and stats labels */
    .highlight {
        color: #1E90FF; /* Dodger Blue */
        font-weight: bold;
    }
</style>
<div class="admin-header">Admin Panel</div>

<div class="container">

    <div class="button-group" style="text-align:center;">
        <a href="add_service.php"><button class="add-btn">Add Service</button></a>
        <a href="remove_service.php"><button class="remove-btn">Remove Service</button></a>
    </div>

    <!-- Provider Info Cards -->
    <h3 style="
    text-align: center; 
    margin-top: 40px; 
    font-size: 28px; 
    font-weight: 700; 
    color: #032642; 
    position: relative; 
    display: inline-block;
    padding-bottom: 8px;
    border-bottom: 3px solid #F15B29;
    letter-spacing: 1.2px;
    ">
    Provider Information
</h3>
    <div class="provider-cards">
        <?php while ($row = $providers->fetch_assoc()) { ?>
            <div class="provider-card">
                <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                <div class="provider-info"><strong>ID:</strong> <?php echo htmlspecialchars($row['provider_id']); ?></div>
                <div class="provider-info"><strong class="highlight">Email:</strong> <?php echo htmlspecialchars($row['email']); ?></div>
                <div class="provider-info"><strong class="highlight">Total Services Done:</strong> <?php echo htmlspecialchars($row['total_services']); ?></div>
                <div class="provider-info"><strong class="highlight">Average Rating:</strong> 
                    <?php 
                    echo $row['average_rating'] !== null ? htmlspecialchars($row['average_rating']) : 'N/A'; 
                    ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <!-- User Info Cards -->
   <h3 style="
    text-align: center; 
    margin-top: 40px; 
    font-size: 28px; 
    font-weight: 700; 
    color: #032642; 
    position: relative; 
    display: inline-block;
    padding-bottom: 8px;
    border-bottom: 3px solid #F15B29;
    letter-spacing: 1.2px;
    ">
    User Information
</h3>

    <div class="user-cards">
        <?php while ($row = $users->fetch_assoc()) { ?>
            <div class="user-card">
                <h4><?php echo htmlspecialchars($row['name']); ?></h4>
                <div class="user-info"><strong>ID:</strong> <?php echo htmlspecialchars($row['user_id']); ?></div>
                <div class="user-info"><strong class="highlight">Email:</strong> <?php echo htmlspecialchars($row['email']); ?></div>
                <div class="user-info"><strong class="highlight">Phone:</strong> <?php echo htmlspecialchars($row['phone']); ?></div>
                <div class="user-info"><strong class="highlight">City:</strong> <?php echo htmlspecialchars($row['city']); ?></div>
                <div class="user-info"><strong class="highlight">State:</strong> <?php echo htmlspecialchars($row['state']); ?></div>
                <div class="user-info"><strong class="highlight">Services Booked:</strong> <?php echo htmlspecialchars($row['total_booked_services']); ?></div>
            </div>
        <?php } ?>
    </div>

</div>

<?php include('footer.php'); ?>
