<?php
// plumber.php
include('header.php');
?>
<div class="service-detail">
   
    <h2>Plumber Services</h2>
    <p>We provide top-quality plumbing services for repairs, installations, and more.</p>
    
    <form action="search_results.php" method="GET">
        <label for="location">Enter your location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required>
        
        <label for="price">Enter your budget (Price range):</label>
        <input type="number" id="price" name="price" placeholder="Price" required>
        
        <button type="submit" class="btn">Search</button>
    </form>
</div>
<style type="text/css">
    
   
     .btn {
            background-color: #032642;
           
        }
        .btn:hover {
            background-color: #F15B29;
        }
</style>
<?php
include('footer.php');
?>
