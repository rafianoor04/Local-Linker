
<?php include('header.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <style>
        .about-header {
            background-color: #032642;
            color: white;
            padding: 30px 0;
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            border-bottom: 4px solid #F15B29;
        }

        .about-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .about-section {
            margin-bottom: 30px;
        }

        .about-section h2 {
            color: #032642;
            font-size: 24px;
            margin-bottom: 10px;
            border-left: 5px solid #F15B29;
            padding-left: 10px;
        }

        .about-section p {
            font-size: 16px;
            color: #333;
        }

        .stats-box {
            display: flex;
            justify-content: space-around;
            margin-top: 30px;
            text-align: center;
        }

        .stat {
            background-color: #f4f4f4;
            padding: 20px;
            border-radius: 8px;
            width: 30%;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
        }

        .stat h3 {
            color: #F15B29;
            font-size: 28px;
        }

        .stat p {
            color: #032642;
            font-size: 16px;
        }

        .cta-button {
            display: block;
            width: fit-content;
            margin: 40px auto 0;
            padding: 12px 24px;
            background-color: #032642;
            color: white;
            font-size: 18px;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
        }

        .cta-button:hover {
            background-color: #F15B29;
        }
    </style>
</head>
<body>

<div class="about-header">About Us</div>

<div class="about-container">

    <div class="about-section">
        <h2>Who We Are</h2>
        <p>
            We are a dynamic online service platform dedicated to connecting users with reliable and skilled service providers. From household chores to expert repairs, we ensure seamless service bookings across various categories.
        </p>
    </div>

    <div class="about-section">
        <h2>Our Mission</h2>
        <p>
            Our mission is simple — to make your life easier. We strive to deliver trusted services by verified professionals, all at your fingertips. With us, convenience and satisfaction are guaranteed.
        </p>
    </div>

    <div class="about-section">
        <h2>Why Choose Us?</h2>
        <p>
            - Verified and skilled providers<br>
            - Simple and fast booking process<br>
            - Transparent pricing<br>
            - 24/7 customer support<br>
            - Real-time updates and feedback
        </p>
    </div>

    <div class="stats-box">
        <div class="stat">
            <h3>500+</h3>
            <p>Services Completed</p>
        </div>
        <div class="stat">
            <h3>300+</h3>
            <p>Happy Users</p>
        </div>
        <div class="stat">
            <h3>50+</h3>
            <p>Verified Providers</p>
        </div>
    </div>

    <a class="cta-button" href="service.php">Explore Services</a>
</div>

<?php include('footer.php'); ?>
</body>
</html>