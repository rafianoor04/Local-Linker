<!-- furniture.php -->
<?php
include('header.php');
?>

<div class="service-detail">
    
    <h2>Furniture Moving Services</h2>
    <p>We provide efficient furniture moving services for home and office relocations.</p>
    
    <form action="search_results.php" method="GET">
        <label for="location">Enter your location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required>
        
        <label for="price">Enter your budget (Price range):</label>
        <input type="number" id="price" name="price" placeholder="Price" required>
        
        <button type="submit">Search</button>
    </form>
</div>

<style>
    .service-detail{

        margin-bottom: 180px;
    }
   
</style>
<?php
include('footer.php');
?>
