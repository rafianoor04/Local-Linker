<?php
// home.php
include('header.php');
include('connection.php'); // Include database connection

// Fetch distinct categories
$query = "SELECT DISTINCT category FROM service";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Service Categories</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .category-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-bottom: 300px;
        }

        .category-box {
            width: 300px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .category-box img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 5px;
        }

        .category-box h2 {
            margin: 15px 0 10px;
            font-size: 20px;
        }

        .category-box a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #032642;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .category-box a:hover {
            background-color: #F15B29;
        }

        header {
            background: #032642;
            color: white;
        }

        header nav ul li a:hover {
            color: #F15B29;
            background-color: #fff;
            border-radius: 5px;
        }

        .footer-content p {
            color: #fff;
        }
    </style>
</head>
<body>

    <h1 style="text-align:center; margin: 30px 0;">Service Categories</h1>

    <div class="category-container">
        <?php while ($row = mysqli_fetch_assoc($result)): 
            $category = $row['category'];
            $categoryEncoded = urlencode($category);
            $imagePath = "img/" . strtolower(trim($category)) . ".jpeg";
        ?>
            <div class="category-box">
                <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($category); ?>" onerror="this.src='img/default.jpeg';">
                <h2><?php echo ucfirst($category); ?></h2>
                <a href="search_results.php?category=<?php echo $categoryEncoded; ?>">View Services</a>
            </div>
        <?php endwhile; ?>
    </div>

</body>
</html>


<?php include('footer.php'); ?>



