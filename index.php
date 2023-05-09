<?php
include './menu.inc';
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit();
}
?>

<body>


  <main>
    <section>
      <h1 id="heading1">Welcome to Company</h1>
      <p>Welcome to our innovative IT company! We specialize in providing cutting-edge software solutions to businesses across various industries, helping our clients increase their efficiency and productivity through innovative technology solutions.</p>
      <p>At our company, we are committed to upholding our values of excellence, collaboration, and customer satisfaction. We offer a comprehensive benefits package that includes health, dental, and vision insurance, retirement plans, paid time off, and opportunities for professional development. We also provide a flexible work schedule and a supportive work environment.</p>
      <p>Our commitment to employee growth and development is reflected in our training programs, mentorship, and leadership development initiatives. We encourage our employees to share their ideas and work together to find creative solutions for our clients.</p>
      <p>Our company culture is characterized by a strong focus on innovation, collaboration, and customer satisfaction. We are proud to give back to our local communities through volunteerism and philanthropy. As a result of our dedication to excellence, we have been recognized as a leader in the IT industry, and our employees have received numerous awards and certifications for their contributions to the field.</p>

      <p>
        <a href="./jobs.php">View our current job openings</a>
      </p>
    </section>
  </main>
  <div class="imageSlider">
    <input type="radio" name="slide" id="img-1" checked class="trackRadio">
    <input type="radio" name="slide" id="img-2" class="trackRadio">
    <input type="radio" name="slide" id="img-3" class="trackRadio">

    <div class="img-box">
      <img id="three" src="./images/image1.jpg">
      <img id="two" src="./images/image2.jpeg">
      <img id="one" src="./images/image3.jpg">
    </div>
    <div class="navRadio">
      <label for="img-1">
        <div id="dot-1" class="radio"></div>
      </label>
      <label for="img-2">
        <div id="dot-2" class="radio"></div>
      </label>
      <label for="img-3">
        <div id="dot-3" class="radio"></div>
      </label>
    </div>

  </div>
</body>


<?php
include './footer.inc';
?>