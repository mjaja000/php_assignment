<?php
// public/contact.php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - Muruugi Primary Schools</title>
    <link rel="stylesheet" href="assets/css/contact.css">
</head>
<body>
    <?php include '../frontend/navbar.php'; ?>

    <header>
        <h1><p id="welcome">WELCOME TO MURUUGI PRIMARY SCHOOL</p></h1>
        <div class="nbar">
            <div class="dropdown">
                <button class="dropbtn">
                    <img src="assets/image/toogle-icon.png" alt="Menu Toggle">
                </button>
                <div class="dropdown-content">
                    <a href="index.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="courses.php">Courses</a>
                    <a href="admissions.php">Admission</a>
                    <a href="contact.php">Contact</a>
                </div>
            </div>
        </div>
        <nav class="navbar">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="admissions.php">Admission</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <section>
            <h2>Contact Information</h2>
            <div class="box-cont">
                <p>For inquiries and assistance, please contact the HEADTEACHER'S office:</p>
                <address>
                    <strong>Physical Location:</strong> Abothuguchi West, near Meru Town, Central Imenti Constituency, Meru County, Kenya <br>
                    <strong>Postal Address:</strong> P.O. Box 60200, Meru, Kenya <br>
                    <strong>Email:</strong> info@muruugischools.ke <br>
                    <strong>Phone:</strong> +254 712 345678
                </address>
            </div>
        </section>

        <section>
            <h2>Contact Us</h2>
            <p>Please use the form below to send us your inquiries or feedback.</p>
            <form action="../backend/process_contact.php" method="POST">
                <label for="name">Your Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </section>
    </main>

    <footer>
        <div class="handles">
            <ul>
                <li><a href="#"><img src="assets/image/instagram-icon.png" alt="Instagram"></a></li>
                <li><a href="#"><img src="assets/image/twitter-icon.png" alt="Twitter"></a></li>
                <li><a href="#"><img src="assets/image/fb-icon.png" alt="Facebook"></a></li>
            </ul>
        </div>
        <p>&copy; 2025 Muruugi Primary</p>
    </footer>

    <script src="assets/js/main.js"></script>
</body>
</html>
