<?php
include('header.php'); 
include('connection.php'); // Database connection

$message = ""; // Holds success or error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data without validation
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password']; 
    $zip_code = $_POST['zip_code'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $street = $_POST['street']; // Assign the street data

    // Insert user data directly into the database (no validation, no password hashing)
    $query_user = "INSERT INTO user (name, email, phone, password, street, zipcode, state, city) 
                   VALUES ('$name', '$email', '$phone', '$password', '$street', '$zip_code', '$state', '$city')";

    if (mysqli_query($conn, $query_user)) {
        $message = "<div style='background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px;'>
                        Registration successful! You can now <a href='login.php'>log in</a>.
                    </div>";
    } else {
        $message = "<div style='background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px;'>
                        Database Error: " . mysqli_error($conn) . "
                    </div>";
    }
}
?>

<h2>Sign Up</h2>

<!-- Display success or error message -->
<?php echo $message; ?>

<form action="signup.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="phone">Phone:</label>
    <input type="tel" id="phone" name="phone" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <label for="street">Street:</label>
    <input type="text" id="street" name="street" required>

    <label for="zip_code">Zip Code:</label>
    <input type="text" id="zip_code" name="zip_code" required>

    <label for="state">State:</label>
    <input type="text" id="state" name="state" required>

    <label for="city">City:</label>
    <input type="text" id="city" name="city" required>

    <button type="submit" class="btn">Sign Up</button>
</form>

<style type="text/css">
    
   
     .btn {
            background-color: #032642;
           
        }
        .btn:hover {
            background-color: #F15B29;
        }
</style>

<?php include('footer.php'); ?>
