var formFilter = document.getElementById('formFilter')
var order = document.getElementById('order')
var platform = document.getElementById('primeiroSelect')
var category = document.getElementById('category')
var price = document.getElementById('ultimoSelect')
var filtrar = document.getElementById('name')
var mode = document.getElementById('mode')

formFilter.addEventListener('submit', function(e) {
  if(order.value == '') {
    order.disabled = true
  }
  if(platform.value == '') {
    platform.disabled = true
  }
  if(category.value == '') {
    category.disabled = true
  }
  if(price.value == '') {
    price.disabled = true
  }
  if(filtrar.value == '') {
    filtrar.disabled = true
  }
  if(mode.value == '') {
    mode.disabled = true
  }
})

const games = document.querySelectorAll('.slideGameSection')
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
}