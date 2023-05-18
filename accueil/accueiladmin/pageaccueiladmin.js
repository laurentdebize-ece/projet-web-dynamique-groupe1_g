const slides = document.querySelectorAll(".slide");
const prevBtn = document.querySelector("#prev");
const nextBtn = document.querySelector("#next");

let slideIndex = 0;

function showSlide() {
  slides.forEach(slide => slide.classList.remove("active"));
  slides[slideIndex].classList.add("active");
}

function prevSlide() {
  slideIndex--;
  if (slideIndex < 0) {
    slideIndex = slides.length - 1;
  }
  showSlide();
}

function nextSlide() {
  slideIndex++;
  if (slideIndex > slides.length - 1) {
    slideIndex = 0;
  }
  showSlide();
}

prevBtn.addEventListener("click", prevSlide);
nextBtn.addEventListener("click", nextSlide);

setInterval(nextSlide, 5000);



