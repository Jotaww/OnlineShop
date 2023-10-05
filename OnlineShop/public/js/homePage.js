/* const slidePC = document.querySelectorAll('#slidePC');
slidePC[0].classList.add('active');
const slideMobile = document.querySelectorAll('#slideMobile');
slideMobile[0].classList.add('active');

const slideGameSection = document.querySelectorAll('.slideGameSection')
const favIcon = document.querySelectorAll('#favIcon')
const favSlide = document.querySelectorAll('#favSlide')

for (let index = 0; index < slideGameSection.length; index++) {
  if(window.innerWidth <= 768) {
    slideGameSection[3].style.display = 'block'
    slideGameSection[4].style.display = 'none'
    slideGameSection[8].style.display = 'block'
    slideGameSection[9].style.display = 'none'
    slideGameSection[13].style.display = 'block'
    slideGameSection[14].style.display = 'none'
    slideGameSection[18].style.display = 'block'
    slideGameSection[19].style.display = 'none'
  }
  else if(window.innerWidth <= 992) {
    slideGameSection[3].style.display = 'none'
    slideGameSection[4].style.display = 'none'
    slideGameSection[8].style.display = 'none'
    slideGameSection[9].style.display = 'none'
    slideGameSection[13].style.display = 'none'
    slideGameSection[14].style.display = 'none'
    slideGameSection[18].style.display = 'none'
    slideGameSection[19].style.display = 'none'
  }
  else if(window.innerWidth <= 1200) {
    slideGameSection[3].style.display = 'block'
    slideGameSection[4].style.display = 'none'
    slideGameSection[8].style.display = 'block'
    slideGameSection[9].style.display = 'none'
    slideGameSection[13].style.display = 'block'
    slideGameSection[14].style.display = 'none'
    slideGameSection[18].style.display = 'block'
    slideGameSection[19].style.display = 'none'
  } else {
    slideGameSection[3].style.display = 'block'
    slideGameSection[4].style.display = 'block'
    slideGameSection[8].style.display = 'block'
    slideGameSection[9].style.display = 'block'
    slideGameSection[13].style.display = 'block'
    slideGameSection[14].style.display = 'block'
    slideGameSection[18].style.display = 'block'
    slideGameSection[19].style.display = 'block'
  }

  window.addEventListener('resize', function() {
    
    if(window.innerWidth <= 768) {
      slideGameSection[3].style.display = 'block'
      slideGameSection[4].style.display = 'none'
      slideGameSection[8].style.display = 'block'
      slideGameSection[9].style.display = 'none'
      slideGameSection[13].style.display = 'block'
      slideGameSection[14].style.display = 'none'
      slideGameSection[18].style.display = 'block'
      slideGameSection[19].style.display = 'none'
    }
    else if(window.innerWidth <= 992) {
      slideGameSection[3].style.display = 'none'
      slideGameSection[4].style.display = 'none'
      slideGameSection[8].style.display = 'none'
      slideGameSection[9].style.display = 'none'
      slideGameSection[13].style.display = 'none'
      slideGameSection[14].style.display = 'none'
      slideGameSection[18].style.display = 'none'
      slideGameSection[19].style.display = 'none'
    }
    else if(window.innerWidth <= 1200) {
      slideGameSection[3].style.display = 'block'
      slideGameSection[4].style.display = 'none'
      slideGameSection[8].style.display = 'block'
      slideGameSection[9].style.display = 'none'
      slideGameSection[13].style.display = 'block'
      slideGameSection[14].style.display = 'none'
      slideGameSection[18].style.display = 'block'
      slideGameSection[19].style.display = 'none'
    } else {
      slideGameSection[3].style.display = 'block'
      slideGameSection[4].style.display = 'block'
      slideGameSection[8].style.display = 'block'
      slideGameSection[9].style.display = 'block'
      slideGameSection[13].style.display = 'block'
      slideGameSection[14].style.display = 'block'
      slideGameSection[18].style.display = 'block'
      slideGameSection[19].style.display = 'block'
    }
  });

  slideGameSection[index].addEventListener('mouseenter', () => {
    favIcon[index].style.display = 'flex';
  });
  
  slideGameSection[index].addEventListener('mouseleave', () => {
    favIcon[index].style.display = 'none';
  });

  favIcon[index].addEventListener('mouseenter', () => {
    favIcon[index].classList.remove('bi-heart');
    favIcon[index].classList.add('bi-heart-fill');
  });
  
  favIcon[index].addEventListener('mouseleave', () => {
    favIcon[index].classList.remove('bi-heart-fill');
    favIcon[index].classList.add('bi-heart');
  });

  favSlide[index].addEventListener('mouseenter', () => {
      favSlide[index].classList.remove('bi-heart');
      favSlide[index].classList.add('bi-heart-fill');
  });
  
  favSlide[index].addEventListener('mouseleave', () => {
      favSlide[index].classList.remove('bi-heart-fill');
      favSlide[index].classList.add('bi-heart');
  });
  
}



 */

const prevButton = document.querySelector('.prev-button');
const nextButton = document.querySelector('.next-button');
const slidesContainer = document.querySelector('.slides');
const slides = document.querySelectorAll('.slide');
const dots = document.querySelectorAll(".dot");
let currentIndex = 0;
let interval;

function showSlide(index, previousIndex) {
  dots[previousIndex].classList.remove('active');
  dots[index].classList.add('active');
  slidesContainer.style.transform = `translateX(-${index * 100}%)`;
}

function nextSlide() {
  previousIndex = currentIndex;
  currentIndex = (currentIndex + 1) % slides.length;
  showSlide(currentIndex, previousIndex);
}

function startCarousel() {
  interval = setInterval(nextSlide, 7000);
}

function stopCarousel() {
  clearInterval(interval);
}

prevButton.addEventListener('click', () => {
  stopCarousel();
  previousIndex = currentIndex;
  currentIndex = (currentIndex - 1 + slides.length) % slides.length;
  showSlide(currentIndex, previousIndex);
  startCarousel();
});

nextButton.addEventListener('click', () => {
  stopCarousel();
  nextSlide();
  startCarousel();
});

dots.forEach((dot, index) => {
  dot.addEventListener("click", () => {
      stopCarousel();
      previousIndex = currentIndex;
      currentIndex = index;
      showSlide(currentIndex, previousIndex);
      startCarousel();
  });
});

startCarousel();

const prevButtonMobile = document.querySelector('.prev-button-mobile');
const nextButtonMobile = document.querySelector('.next-button-mobile');
const slidesContainerMobile = document.querySelector('.slidesMobile');
const slidesMobile = document.querySelectorAll('.slideMobile');
const dotsMobile = document.querySelectorAll(".dotMobile");
let currentIndexMobile = 0;
let intervalMobile;

function showSlideMobile(indexMobile, previousIndexMobile) {
  dotsMobile[previousIndexMobile].classList.remove('active');
  dotsMobile[indexMobile].classList.add('active');
  slidesContainerMobile.style.transform = `translateX(-${indexMobile * 100}%)`;
}

function nextSlideMobile() {
  previousIndexMobile = currentIndexMobile;
  currentIndexMobile = (currentIndexMobile + 1) % slidesMobile.length;
  showSlideMobile(currentIndexMobile, previousIndexMobile);
}

function startCarouselMobile() {
  intervalMobile = setInterval(nextSlideMobile, 7000);
}

function stopCarouselMobile() {
  clearInterval(intervalMobile);
}

prevButtonMobile.addEventListener('click', () => {
  stopCarouselMobile();
  previousIndexMobile = currentIndexMobile;
  currentIndexMobile = (currentIndexMobile - 1 + slidesMobile.length) % slidesMobile.length;
  showSlideMobile(currentIndexMobile, previousIndexMobile);
  startCarouselMobile();
});

nextButtonMobile.addEventListener('click', () => {
  stopCarouselMobile();
  nextSlideMobile();
  startCarouselMobile();
});

dotsMobile.forEach((dotMobile, indexMobile) => {
  dotMobile.addEventListener("click", () => {
      stopCarouselMobile();
      previousIndexMobile = currentIndexMobile;
      currentIndexMobile = indexMobile;
      showSlideMobile(currentIndexMobile, previousIndexMobile);
      startCarouselMobile();
  });
});

startCarouselMobile();

const games = document.querySelectorAll('.games')
const formFav = document.querySelectorAll('#formFav')
const favIcon = document.querySelectorAll('#favIcon')
var trueFav = false;

for (let index = 0; index < games.length; index++) {

  games[index].addEventListener('mouseenter', () => {
    if(favIcon[index].className == 'bi bi-heart-fill') {
      trueFav = true
    }else {
      trueFav = false
    }
    formFav[index].style.display = 'flex';
  });
  
  games[index].addEventListener('mouseleave', () => {
    formFav[index].style.display = 'none';
  });
  
  formFav[index].addEventListener('mouseenter', () => {
    if(trueFav == false) {
      favIcon[index].classList.remove('bi-heart');
      favIcon[index].classList.add('bi-heart-fill');
    }
  });
  
  formFav[index].addEventListener('mouseleave', () => {
    if(trueFav == false) {
      favIcon[index].classList.remove('bi-heart-fill');
      favIcon[index].classList.add('bi-heart');
    }
  });

  if(window.innerWidth <= 600) {
    games[3].style.display = 'block'
    games[4].style.display = 'none'
    games[8].style.display = 'block'
    games[9].style.display = 'none'
  }
  else if(window.innerWidth <= 768) {
    games[3].style.display = 'none'
    games[4].style.display = 'none'
    games[8].style.display = 'none'
    games[9].style.display = 'none'
  }
  else if(window.innerWidth <= 992) {
    games[3].style.display = 'block'
    games[4].style.display = 'none'
    games[8].style.display = 'block'
    games[9].style.display = 'none'
  }
  else {
    games[3].style.display = 'block'
    games[4].style.display = 'block'
    games[8].style.display = 'block'
    games[9].style.display = 'block'
  }

  window.addEventListener('resize', function() {
    
    if(window.innerWidth <= 600) {
      games[3].style.display = 'block'
      games[4].style.display = 'none'
      games[8].style.display = 'block'
      games[9].style.display = 'none'
      games[13].style.display = 'block'
      games[14].style.display = 'none'
      games[18].style.display = 'block'
      games[19].style.display = 'none'
    }
    else if(window.innerWidth <= 768) {
      games[3].style.display = 'none'
      games[4].style.display = 'none'
      games[8].style.display = 'none'
      games[9].style.display = 'none'
      games[13].style.display = 'none'
      games[14].style.display = 'none'
      games[18].style.display = 'none'
      games[19].style.display = 'none'
    }
    else if(window.innerWidth <= 992) {
      games[3].style.display = 'block'
      games[4].style.display = 'none'
      games[8].style.display = 'block'
      games[9].style.display = 'none'
      games[13].style.display = 'block'
      games[14].style.display = 'none'
      games[18].style.display = 'block'
      games[19].style.display = 'none'
    }
    else {
      games[3].style.display = 'block'
      games[4].style.display = 'block'
      games[8].style.display = 'block'
      games[9].style.display = 'block'
      games[13].style.display = 'block'
      games[14].style.display = 'block'
      games[18].style.display = 'block'
      games[19].style.display = 'block'
    }

  })

}
