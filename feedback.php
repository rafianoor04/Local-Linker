<?php
include('header.php');
include('connection.php');

$providers = [];
$services = [];
$feedback_message = "";

// Fetch all providers
$provider_query = "SELECT provider_id, name FROM provider ORDER BY name";
$provider_result = mysqli_query($conn, $provider_query);
while ($row = mysqli_fetch_assoc($provider_result)) {
    $providers[] = $row;
}

// Fetch all service categories (distinct)
$service_query = "SELECT DISTINCT category FROM service ORDER BY category";
$service_result = mysqli_query($conn, $service_query);
while ($row = mysqli_fetch_assoc($service_result)) {
    $services[] = $row['category'];
}

// Handle feedback form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $provider_id = $_POST['provider_id'];
    $service_category = $_POST['service_category'];
    $rating = $_POST['rating'];
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

    // Get service_id from category (choose first matching service)
    $service_id_query = "SELECT service_id FROM service WHERE category = '$service_category' LIMIT 1";
    $service_id_result = mysqli_query($conn, $service_id_query);
    $service_id = null;
    if ($row = mysqli_fetch_assoc($service_id_result)) {
        $service_id = $row['service_id'];
    }

    if ($service_id) {
        $insert_query = "INSERT INTO feedback (provider_id, service_id, rating, feedback) 
                         VALUES ('$provider_id', '$service_id', '$rating', '$feedback')";
        if (mysqli_query($conn, $insert_query)) {
            $feedback_message = "<p style='color:green;'>Feedback submitted successfully!</p>";
        } else {
            $feedback_message = "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    } else {
        $feedback_message = "<p style='color:red;'>Invalid service category selected.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Provide Feedback</title>
    <style>
        .star-rating {
            direction: rtl;
            display: inline-flex;
            justify-content: start;
        }
        .star-rating input[type="radio"] {
            display: none;
        }
        .star-rating label {
            font-size: 2em;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
        }
        .star-rating input[type="radio"]:checked ~ label,
        .star-rating label:hover,
        .star-rating label:hover ~ label {
            color: gold;
        }
        form {
            max-width: 600px;
            margin-bottom: 330px;
        }
        label {
            display: block;
            margin-top: 15px;
        }
        select, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            box-sizing: border-box;
        }
        .fbtn {
            background-color: #032642;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
            font-weight: bold;
        }
        .fbtn:hover {
            background-color: #F15B29;
        }
    </style>
</head>
<body>
    <h1>Provide Feedback</h1>
    
    <?php echo $feedback_message; ?>

    <form action="feedback.php" method="POST">
        <label for="provider_id">Select Provider:</label>
        <select name="provider_id" id="provider_id" required>
            <option value="">-- Select Provider --</option>
            <?php foreach ($providers as $provider): ?>
                <option value="<?php echo $provider['provider_id']; ?>">
                    <?php echo htmlspecialchars($provider['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="service_category">Select Service Category:</label>
        <select name="service_category" id="service_category" required>
            <option value="">-- Select Service Category --</option>
            <?php foreach ($services as $service_category): ?>
                <option value="<?php echo htmlspecialchars($service_category); ?>">
                    <?php echo htmlspecialchars($service_category); ?>
                </option>
            <?php endforeach; ?>
        </select>

        <label for="rating">Rating:</label>
        <div class="star-rating">
            <input type="radio" id="star5" name="rating" value="5" required><label for="star5" title="5 stars">★</label>
            <input type="radio" id="star4" name="rating" value="4"><label for="star4" title="4 stars">★</label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3" title="3 stars">★</label>
            <input type="radio" id="star2" name="rating" value="2"><label for="star2" title="2 stars">★</label>
            <input type="radio" id="star1" name="rating" value="1"><label for="star1" title="1 star">★</label>
        </div>

        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="4" required></textarea>

        <button type="submit" class="fbtn">Submit Feedback</button>
    </form>
</body>
</html>

<?php include('footer.php'); ?>
