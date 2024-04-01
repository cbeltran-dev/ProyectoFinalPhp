// Seleccionar los elementos del carrusel y las diapositivas
const carousel = document.querySelector('.carousel');
const slides = document.querySelectorAll('.slide');
const totalSlides = slides.length;
const slideWidth = slides[0].clientWidth;

let currentIndex = 0;

// Inicializar el carrusel
moveToSlide(currentIndex);

function moveToSlide(index) {
    if (index < 0) {
        index = totalSlides - 1;
    } else if (index >= totalSlides) {
        index = 0;
    }

    currentIndex = index;

    const offset = -currentIndex * slideWidth;
    carousel.style.transform = `translateX(${offset}px)`;
}

function nextSlide() {
    moveToSlide(currentIndex + 1);
}

setInterval(nextSlide, 3000); // Cambia de diapositiva cada 3 segundos
