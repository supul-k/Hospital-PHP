<?php
include './menu.inc';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>

<style>
    .contact-us {
        padding: 50px 0;
    }

    .container {
        max-width: 960px;
        margin: 0 auto;
        padding: 0 20px;
    }

    h2 {
        text-align: center;
        font-size: 30px;
        color: #333;
    }

    .contact-info {
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }

    .contact-item {
        text-align: center;
        margin-right: 30px;
    }

    .contact-item i {
        font-size: 24px;
        color: #666;
        margin-bottom: 10px;
    }

    .contact-item p {
        font-size: 16px;
        color: #666;
        margin: 0;
    }
</style>

<body>
    <section class="contact-us">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="contact-description" style="text-align: center;">
                <p>We value your feedback and inquiries. Please feel free to get in touch with us using the contact information below. Our team is ready to assist you.</p>
            </div>
            <div class="contact-info">
                <div class="contact-item">
                    <i class="fa fa-map-marker"></i>
                    <p>123 Hospital Street, City, State, Country</p>
                </div>
                <div class="contact-item">
                    <i class="fa fa-phone"></i>
                    <p>Phone: 123-456-7890</p>
                </div>
                <div class="contact-item">
                    <i class="fa fa-envelope"></i>
                    <p>Email: info@hospital.com</p>
                </div>
            </div>
        </div>
    </section>
</body>


<?php
include './footer.inc';
?>