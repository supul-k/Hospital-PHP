<?php
include './menu.inc';

session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<style>
    .about-us {
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

    p {
        text-align: center;
        font-size: 16px;
        line-height: 1.5;
        color: black;
        margin-bottom: 20px;
    }
</style>

<div>
    <section class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <p>Welcome to our hospital! We are committed to providing high-quality healthcare services to our patients.</p>
            <p>Our team of experienced doctors, nurses, and staff is dedicated to ensuring the well-being and comfort of every patient who walks through our doors.</p>
            <p>At our hospital, we strive to deliver compassionate care, advanced medical treatments, and state-of-the-art facilities to promote the health and recovery of our patients.</p>
        </div>
    </section>

</div>
<?php
include './footer.inc';
?>