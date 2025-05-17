<?php
include('header.php');
include('connection.php'); // Include database connection

$message = ""; // Variable to hold the success or error message

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $price = isset($_POST['price']) ? $_POST['price'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $location = isset($_POST['location']) ? $_POST['location'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $present_address = isset($_POST['present_address']) ? $_POST['present_address'] : '';
    $permanent_address = isset($_POST['permanent_address']) ? $_POST['permanent_address'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert provider into the provider table
    $query_provider = "INSERT INTO provider (name, location, gender, email, phone, present_address, permanent_address, password) 
                       VALUES ('$name', '$location', '$gender', '$email', '$phone', '$present_address', '$permanent_address', '$hashed_password')";

    if (mysqli_query($conn, $query_provider)) {
        // Get the last inserted provider_id
        $provider_id = mysqli_insert_id($conn);

        // Insert into the service table
        $query_service = "INSERT INTO service (category, price, description) VALUES ('$category', '$price', '$description')";
        if (mysqli_query($conn, $query_service)) {
            // Get the last inserted service_id
            $service_id = mysqli_insert_id($conn);

            // Insert into the offers table
            $query_offer = "INSERT INTO offers (provider_id, service_id) VALUES ('$provider_id', '$service_id')";
            mysqli_query($conn, $query_offer);

            $message = "<div style='background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px;'>
                            Registration successful! Your service has been added.
                        </div>";
        } else {
            $message = "<div style='background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px;'>
                            Error: " . mysqli_error($conn) . "
                        </div>";
        }
    } else {
        $message = "<div style='background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; margin-bottom: 15px; border-radius: 5px;'>
                        Error: " . mysqli_error($conn) . "
                    </div>";
    }
}
?>

<h2>Register as a Service Provider</h2>
<!-- Display success or error message -->
<?php echo $message; ?>

<form action="registration.php" method="POST">
    <label for="name">Provider Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="category">Category:</label>
    <select id="category" name="category" required onchange="updatePriceRange()">
        <option value="" disabled selected>-- Select a Category --</option>
        <option value="Plumber" data-min="50" data-max="150">Plumber</option>
        <option value="Electrician" data-min="30" data-max="100">Electrician</option>
        <option value="Carpenter" data-min="60" data-max="200">Carpenter</option>
    </select>

    <label for="price">Price (USD):</label>
    <input type="number" id="price" name="price" required>
    <p id="price-range" style="font-size: 0.9em; color: gray;"></p>

    <label for="description">Service Description:</label>
    <textarea id="description" name="description" required></textarea>

    <label for="location">Provider Location:</label>
    <input type="text" id="location" name="location" required>

    <!-- New Fields -->
    <label for="gender">Gender:</label>
    <select id="gender" name="gender" required>
        <option value="" disabled selected>-- Select Gender --</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Other">Other</option>
    </select>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="present_address">Present Address:</label>
    <input type="text" id="present_address" name="present_address" required>

    <label for="permanent_address">Permanent Address:</label>
    <input type="text" id="permanent_address" name="permanent_address" required>

  

    <button type="submit" class="btn">Register</button>
</form>
<style type="text/css">
    
   
     .btn {
            background-color: #032642;
           
        }
        .btn:hover {
            background-color: #F15B29;
        }
</style>

<script>
function updatePriceRange() {
    const categoryDropdown = document.getElementById('category');
    const selectedOption = categoryDropdown.options[categoryDropdown.selectedIndex];
    const minPrice = selectedOption.getAttribute('data-min');
    const maxPrice = selectedOption.getAttribute('data-max');
    const priceRange = document.getElementById('price-range');

    if (minPrice && maxPrice) {
        priceRange.textContent = `Price range: $${minPrice} - $${maxPrice}`;
    } else {
        priceRange.textContent = '';
    }
}
</script>

<?php include('footer.php'); ?>



