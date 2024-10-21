<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>

    <!-- Internal CSS -->
    <style>
        /* Reset basic styles */
        body, html {
            margin: 0;
            padding: 0;
            font-family: 'Lato', sans-serif;
        }

        /* Navbar */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            top: 0;
            width: 100%;
            background-color: transparent;
            transition: background-color 0.3s, box-shadow 0.3s;
            z-index: 1000;
            padding: 15px 50px;
        }

        .navbar.scrolled {
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand {
            font-weight: bold;
            color: #333;
            text-decoration: none;
            font-size: 20px;
        }

        .navbar .navbar-brand span {
            color: #db1212;
        }

        /* Navigation Links */
        .navbar-nav {
            display: flex;
            align-items: center;
            list-style: none;
        }

        .navbar-nav .nav-item {
            margin-left: 30px;
        }

        .nav-link {
            color: #fff;
            font-size: 16px;
            text-decoration: none;
            padding: 5px;
            transition: color 0.3s, border-bottom 0.3s;
        }

        .nav-link:hover {
            color: #db1212;
        }

        .navbar.scrolled .nav-link {
            color: #333;
        }

        /* Button hover */
        .btn-outline-primary {
            border: 1px solid #db1212;
            padding: 10px 20px;
            color: #fff;
            background-color: transparent;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-outline-primary:hover {
            background-color: #db1212;
            border-color: #db1212;
            color: white;
        }

        .navbar.scrolled .btn-outline-primary {
            color: #333;
            border-color: #333;
        }

        .navbar.scrolled .btn-outline-primary:hover {
            background-color: #333;
            color: white;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 10px 20px;
                flex-direction: column;
            }

            .navbar-nav {
                flex-direction: column;
                margin-top: 10px;
            }

            .navbar-nav .nav-item {
                margin-left: 0;
                margin-bottom: 10px;
            }
        }

        /* Padding for page content */
        body {
            padding-top: 80px; /* Adjust according to the navbar height */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<header id="main-header">
    <nav class="navbar navbar-expand-lg">
        <!-- Logo -->
        <a class="navbar-brand" href="index.php">
            <span>BB</span>DMS <i class="fas fa-syringe"></i>
        </a>

        <!-- Navigation Links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
    
            <li class="nav-item"><a href="contact.php" class="nav-link">Contact Us</a></li>
            <li class="nav-item"><a href="donor-list.php" class="nav-link">Donor List</a></li>
            <li class="nav-item"><a href="search-donor.php" class="nav-link">Search Donor</a></li>

            <?php if (isset($_SESSION['bbdmsdid'])) { ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">My Account</a>
                    <div class="dropdown-menu">
                        <a href="profile.php" class="dropdown-item">Profile</a>
                        <a href="change-password.php" class="dropdown-item">Change Password</a>
                        <a href="request-received.php" class="dropdown-item">Request Received</a>
                        <a href="logout.php" class="dropdown-item">Logout</a>
                    </div>
                </li>
            <?php } else { ?>
                <li class="nav-item"><a href="admin/index.php" class="nav-link">Admin</a></li>
            <?php } ?>
        </ul>

        <!-- Login Button -->
        <?php if (!isset($_SESSION['bbdmsdid'])) { ?>
            <a href="" class="btn btn-outline-primary ml-lg-3">MY PROFILE</a>
        <?php } ?>
    </nav>
</header>

<!-- JavaScript for scroll effect -->
<script>
    window.addEventListener('scroll', function () {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

</body>
</html>
