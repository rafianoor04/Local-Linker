
<?php
include('header.php');
?>

<div class="service-detail">
   <h2>Carpenter Services</h2> 
   <p>We offer professional carpentry services, including furniture repair, custom woodwork, and home improvement solutions to enhance your living or workspace.</p>
    
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