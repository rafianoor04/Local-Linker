<!-- electrician.php -->
<?php
include('header.php');
?>

<div class="service-detail">

    <h2>Electrician Services</h2>
    <p>We provide professional electrician services for home and office electrical installations, repairs, and maintenance.</p>
    
    <form action="search_results.php" method="GET">
        <label for="location">Enter your location:</label>
        <input type="text" id="location" name="location" placeholder="Enter location" required>
        
        <label for="price">Enter your budget (Price range):</label>
        <input type="number" id="price" name="price" placeholder="Price" required>
        
        <button type="submit" class="btn">Search</button>
    </form>
</div>

<?php
include('footer.php');
?>
<style type="text/css">
    
   
     .btn {
            background-color: #032642;
           
        }
        .btn:hover {
            background-color: #F15B29;
        }
</style>