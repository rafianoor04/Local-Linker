<?php
include('header.php');
include('connection.php');

// Handle form submission
$feedback = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Save to complain table
    $sql = "INSERT INTO complain (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);

    if ($stmt->execute()) {
        $feedback = "Thank you! Your message has been sent successfully.";
    } else {
        $feedback = "Something went wrong. Please try again.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
       
        .section {
            padding: 40px 20px;
            margin: 20px 0;
        }
        .services, .contact-info, .form-section {
            display: flex;
            flex-wrap: wrap;
        }
        .services div, .contact-info div, .form-section div {
            flex: 1;
            padding: 20px;
        }
        .contact-info div {
            text-align: center;
        }
        .contact-info i {
            font-size: 2em;
            margin-bottom: 10px;
            color: #333;
        }
        .contact-info p {
            margin: 0;
        }
        .image-section {
            display: flex;
            align-items: center;
        }
        .image-section img {
            width: 50%;
            height: auto;
        }
        .form-section {
            width: 50%;
            padding: 50px 20px;
            text-align: center; /* Center the content of the form section */
        }
        .form-section h2 {
            text-align: center; /* Ensure the heading is centered */
            margin-bottom: 20px;
            margin-left: 250px;
        }
        .form-section form {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .form-section input, .form-section textarea {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-section button {
            background-color: #F15B29;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-section button:hover {
            background-color: #555;
        }

        .map-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  color: #111;
  font-weight: bold;
  margin-top: 10px;
  transition: color 0.3s ease;
}

.map-link i {
  font-size: 36px;
  margin-bottom: 8px;
}

.map-link:hover {
  color: #019da3;
}

.email-block {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  text-align: center;
  margin: 15px 0;
}

.email-block i {
  font-size: 30px;
  margin-bottom: 5px;
  margin-top: 0px;
  color: #111; /* Optional: match your theme */
}

.email-block a {
  color: inherit;
  text-decoration: none;
  font-weight: bold;
}

.email-block a:hover {
  text-decoration: underline;
}


        /* Resetting some default styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #ffff;
}

/* Footer Section */
#footer {
    background-color: #FFF9F9;
    color: white;
    padding: 40px 0;
}

.footer-top {
    display: flex;
    justify-content: space-between;
    padding-bottom: 25px;
    border-bottom: 1px solid var(--border-color-1);}


.footer-top-logo img {
    max-width: 150px;
}

.social-media ul {
    display: flex;
    gap: 15px;
}

.social-media ul li {
    list-style-type: none;
}

.social-media ul li a {
       width: 50px;
    height: 50px;
    border-radius: 80%;
    background: var(--black-color);
    display: flex;
    align-items: center;
    justify-content: center;


}

.social-media ul li a:hover {
    color: #F15B29;
}

/* Footer Widgets */
.footer-widget-container {
    margin-top: 30px;
    padding-bottom: 93px;
}
.footer-language-box {
    display: flex
    align-items: center;
    gap: 8px;
   
}

.row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
}

.footer-widget {
    background-color: #FFF9F9;
    padding: 20px;
    margin-bottom: 30px;
    border-radius: 8px;
}

.footer-widget-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 15px;
    color: #F15B29;
}

.footer-widget p,
.footer-widget ul {
    color: #bbb;
    font-size: 14px;
}

.footer-widget-list {
    list-style-type: none;
}

.footer-widget-list li {
    margin-bottom: 10px;
}

.footer-widget-list a {
    color: #bbb;
    text-decoration: none;
}

.footer-widget-list a:hover {
    color: #F15B29;
}

/* Language and Currency Selectors */
.footer-language-box {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.language select,
.currency select {
    padding: 5px 10px;
    font-size: 14px;
    background-color: #555;
    color: white;
    border: 1px solid #666;
    border-radius: 5px;
}

.language select:focus,
.currency select:focus {
    border-color: #F15B29;
}
.newsletter-widget-inner{
    background-color: #FFF9F9;

}

/* Newsletter */
.newsletter-widget-inner {
    padding: 20px;
    background-color: #444;
    border-radius: 8px;
}

.newsletter-widget-inner h6 {
    color: #F15B29;
    font-size: 18px;
    margin-bottom: 20px;
}

.footer-newsletter-info {
    text-align: center;
}

.footer-newsletter-form input[type="email"] {
    width: 70%;
    padding: 10px;
    margin-right: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.footer-newsletter-form button {
    padding: 10px 15px;
    background-color: #F15B29;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.footer-newsletter-form button:hover {
    background-color: #e04a00;
}

.checkbox-input {
    margin-top: 15px;
    display: flex;
    justify-content: center;
    align-items: center;
}

.checkbox-input input {
    margin-right: 5px;
}

.footer-contact-info {
    margin-top: 20px;
    font-size: 14px;
}

.footer-contact-info a {
    color: #bbb;
    text-decoration: none;
}

.footer-contact-info a:hover {
    color: #F15B29;
}

.footer-copyright {
    background-color: #222;
    color: white;
    padding: 20px 0;
    text-align: center;
}

.footer-copyright p {
    margin-bottom: 10px;
}

.footer-terms a {
    color: #bbb;
    text-decoration: none;
    margin: 0 10px;
}

.footer-terms a:hover {
    color: #F15B29;
}



/* Responsive Layout */
@media (max-width: 768px) {
    .footer-widget-container {
        flex-direction: column;
        align-items: center;
    }

    .footer-top {
        flex-direction: column;
        align-items: center;
    }

    .footer-top-logo img {
        max-width: 120px;
    }

    .social-media ul {
        justify-content: center;
    }

    .footer-widget {
        width: 100%;
        margin-bottom: 20px;
    }

    .footer-widget-title {
        font-size: 16px;
    }

    .footer-widget p,
    .footer-widget ul {
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .footer-newsletter-form input[type="email"] {
        width: 60%;
    }

    .footer-newsletter-form button {
        width: 35%;
    }
}

    </style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>

<header>
    <h1>Contact Us</h1>
</header>

<section class="section services">

</section>

<section class="section contact-info">
<div class="email-block">
  <i class="fas fa-envelope"></i>
  <a href="mailto:info@servent.com">Email: info@servent.com</a>
</div>

    <div>
        <i class="fas fa-phone"></i>
        <p>Phone: +088 12345686298</p>
    </div>
    <div>
        <i class="fas fa-info-circle"></i>
        <p>Update Info: Call us for the latest offers</p>
    </div>
    <div>
<a href="https://www.google.com/maps?q=Badda+Link+Road" target="_blank" class="map-link">
  <i class="fas fa-map-marker-alt"></i>
  <p>plaza market,gulshan 2 · Dhaka, Bangladesh</p>
</a>

    </div>
</section>

<section class="section image-section">
    <img src="img/con.jpeg" alt="Beauty Parlour" style="border-radius: 10px;">
    <div class="form-section">
    <div style="display: flex; align-items: center; justify-content: center; gap: 10px;">
        <i class="fas fa-paper-plane" style="font-size: 24px; color: #F15B29;"></i>
        <h2>Get in Touch</h2>
    </div>

    <?php if (!empty($feedback)) { ?>
        <div class="feedback-box"><?php echo $feedback; ?></div>
    <?php } ?>

    <form method="post" action="">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</div>
</section>

<script>
function showMessage() {
    return confirm("Are you sure you want to send this message?");
}
</script>



<style>
header {
    background: #032642;
   
}

.footer-copyright{
 background: #032642;

}


</style>

</body>
</html>
<style>
    body {
        background-image: url('img/bg.png');
    }
</style>

<?php include('footer.php'); ?>