window.addEventListener('load', function() {
  startTimer();
  startImageSlider();
  menulink();
});
	
	

function startImageSlider() {
  // Get the images and dots
  const images = document.querySelectorAll('.img-box img');
  const radioButtons = document.querySelectorAll('.radio');

  // Set the current slide index
  let currentSlideIndex = 0;

  // Function to show a slide by index
  function showSlideByIndex(slideIndex) {
    // Hide the current slide
    images[currentSlideIndex].style.opacity = '0';

    // Show the new slide
    images[slideIndex].style.opacity = '1';

    // Update the current slide index
    currentSlideIndex = slideIndex;

    // Update the checked state of the radio button corresponding to the new slide
    document.getElementById(`img-${currentSlideIndex + 1}`).checked = true;
  }

  // Function to show the next slide
  function showNextSlide() {
    // Get the next slide index
    let nextSlideIndex = (currentSlideIndex + 1) % images.length;

    // Show the next slide
    showSlideByIndex(nextSlideIndex);
  }

  // Start the timer to change images every 4 seconds
  setInterval(showNextSlide, 4000);

  // Add event listeners to the radio buttons
  radioButtons.forEach((radioButton, index) => {
    radioButton.addEventListener('click', () => {
      // Show the corresponding slide
      showSlideByIndex(index);
    });
  });
}

// Start the slider
startImageSlider();

function menulink (){
  

var currentUrl = window.location.href;
var menuLinks = document.getElementsByTagName("a");

for (var i = 0; i < menuLinks.length; i++) {
  if (menuLinks[i].href === currentUrl) {
    menuLinks[i].classList.add("active");
  }
}
}



function startTimer() {
  var timeLeft = 600; // 10 minutes in seconds
  var timerElement = document.getElementById("timer");

  var countdown = setInterval(function() {
    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;

    if (seconds < 10) {
      seconds = "0" + seconds;
    }

    timerElement.innerHTML = minutes + ":" + seconds;

    timeLeft--;

    if (timeLeft < 0) {
      clearInterval(countdown);
      alert("Time's up! Your application has been cancelled.");
      window.location.href = "index.html";
    }
  }, 1000);
}

const menuToggle = document.getElementById("menu-toggle");
const nav = document.querySelector("nav");

menuToggle.addEventListener("click", function() {
  nav.classList.toggle("open");
});



