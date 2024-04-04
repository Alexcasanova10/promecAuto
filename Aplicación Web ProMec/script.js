
let currentIndex = 0;

document.querySelector('.prev-button').addEventListener('click', () => {
   navigate(-1);
});

document.querySelector('.next-button').addEventListener('click', () => {
   navigate(1);
});

function navigate(direction) {
   const galleryContainer = document.querySelector('.carrousel-container');
   const totalImages = document.querySelectorAll('.carrousel-item').length;

   currentIndex = (currentIndex + direction + totalImages) % totalImages;
   const offset = -currentIndex * 100;

   galleryContainer.style.transform = `translateX(${offset}%)`;
}

//función para galeria fotos

let index = 0;

document.querySelector('.antes-button').addEventListener('click', () => {
    gal_Navigate(-1);
});

document.querySelector('.despues-button').addEventListener('click', () => {
    gal_Navigate(1);
});

function gal_Navigate(direction) {
   const galleryContainer = document.querySelector('.gal-box');
   const totalImages = document.querySelectorAll('.gal-block').length;

   index = (index + direction + totalImages) % totalImages;
   const offset = -index * 100;

   galleryContainer.style.transform = `translateX(${offset}%)`;
}




