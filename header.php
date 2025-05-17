<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Local Service Management</title>
    <link rel="stylesheet" href="style.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <script src="javascript.js" defer></script>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="feedback.php">Feedback</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="login.php">Login</a></li>
                 <!-- Admin Dropdown -->
                <li class="menu">
                    <a href="#" id="admin-icon">Admin <i class="fa-solid fa-caret-down"></i></a>
                    <div class="dropdown-content">
                        <div class="dropdown-box">
                            <a href="admin_login.php">Log In</a>
                            <a href="admin_logout.php">Log Out</a>
                        </div>
                    </div>
                </li>
                <!-- User Dropdown -->
                <li class="menu">
                    <a href="#" id="user-icon"><i class="fa-solid fa-user"></i></a>
                    <div id="dropdown-menu" class="dropdown-content">
                        <div class="dropdown-box">
                            <a href="registration.php">Register</a>
                            <a href="signup.php">Sign Up</a>
                        </div>
                    </div>
                </li>

            </ul>
        </nav>
    </header>

    <style>
        header {
            background: #032642;
            padding: 10px 0;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            padding: 0;
        }

        nav ul li {
            position: relative;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            padding: 10px;
            display: block;
        }

        nav ul li a:hover {
            color: #F15B29;
            background-color: #fff;
            border-radius: 5px;
        }

        /* Dropdown Styles */
        .menu {
            position: relative;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: white;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            min-width: 120px;
            z-index: 10;
            top: 100%;
            left: 0;
            border-radius: 5px;
            overflow: hidden;
        }

        .dropdown-box a {
            display: block;
            padding: 10px;
            color: #032642;
            text-decoration: none;
        }

        .dropdown-box a:hover {
            background-color: #f1f1f1;
        }

        /* Show dropdown on hover */
        .menu:hover .dropdown-content {
            display: block;
        }
    </style>
</body>
</html>


   
