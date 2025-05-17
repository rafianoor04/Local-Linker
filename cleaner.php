<!-- cleaner.php -->
<?php
include('header.php');
?>

<div class="service-detail">
    
<h2>Cleaning Services</h2> 
<p>We offer professional cleaning services for homes and offices, ensuring spotless and hygienic spaces tailored to your needs.</p>

    <form action="search_results.php" method="GET">
        <label for="location">Enter your location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required>
        
        <label for="price">Enter your budget (Price range):</label>
        <input type="number" id="price" name="price" placeholder="Price" required>
        
        <button type="submit">Search</button>
    </form>
</div>

<?php
include('footer.php');
?>
