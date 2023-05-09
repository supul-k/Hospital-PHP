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
      <h1 id="heading1">Welcome to Our Hospital</h1>
      <p>Welcome to our state-of-the-art hospital, where compassionate care and patient well-being are our top priorities. We are dedicated to providing the highest quality medical services to our community.</p>
      <p>At our hospital, we have assembled a team of skilled healthcare professionals who are committed to delivering personalized care and treatment tailored to each patient's unique needs. Our doctors, nurses, and staff are experts in their fields and work collaboratively to ensure the best outcomes for our patients.</p>
      <p>With cutting-edge medical technology and advanced facilities, we offer a wide range of specialized services including diagnostics, surgery, rehabilitation, and preventive care. Our aim is to not only treat illnesses but also promote overall wellness and disease prevention.</p>
      <p>We understand that a hospital visit can be stressful, and our friendly and compassionate staff are here to support you every step of the way. We strive to create a comfortable and healing environment for our patients and their families.</p>
      <p>As a community-focused hospital, we are deeply committed to serving our local area. We actively engage in community outreach programs, health education initiatives, and partnerships with other healthcare organizations to improve the well-being of our community.</p>
      <p>We are honored to have the opportunity to care for you and your loved ones. Your health and satisfaction are our utmost priorities, and we are here to provide exceptional medical care and support during your journey to recovery and wellness.</p>
    </section>
  </main>
  <div class="imageSlider">
    <input type="radio" name="slide" id="img-1" checked class="trackRadio">
    <input type="radio" name="slide" id="img-2" class="trackRadio">
    <input type="radio" name="slide" id="img-3" class="trackRadio">

    <div class="img-box">
      <img id="three" src="./images/image1.jpg">
      <img id="two" src="./images/image2.jpg">
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