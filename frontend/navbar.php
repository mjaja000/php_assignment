<?php
namespace Frontend;

class Navbar {
    public static function render() {
        echo '
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="admissions.php">Admissions</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
        ';
    }
}
?>
